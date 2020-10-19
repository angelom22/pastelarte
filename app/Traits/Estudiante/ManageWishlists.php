<?php
namespace App\Traits\Estudiante;

use App\Events\CourseAddedToWishlist;
use App\Models\Curso;
use App\Models\Wishlist;

trait ManageWishlists {
    public function toggleItemOnWishlist(Curso $curso) {
        if (request()->ajax()) {
            $cursoInMyWishlist = Wishlist::where("curso_id", $curso->id)->first();
            if (!$cursoInMyWishlist) {
                $wishlist = Wishlist::create([
                    "curso_id" => $curso->id
                ]);

                $wishlist->load("user", "curso.user");
                event(new CourseAddedToWishlist($wishlist));
            } else {
                $cursoInMyWishlist->delete();
            }
            return response(["message" => "success"]);
        }
        return abort(401);
    }

    public function meWishlist() {
        $wishlist = Wishlist::with("curso", "carrera")->simplePaginate(4);
        return view("estudiante.wishlist.index", compact("wishlist"));
    }

    public function destroyWishlistItem(int $id) {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        session()->flash("message", ["success", __("Has eliminado el curso de tu lista de deseos")]);
        return redirect(route('estudiante.wishlist.me'));
    }
}
