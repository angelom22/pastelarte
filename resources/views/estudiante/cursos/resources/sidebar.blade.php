<div class="recent_job_activity">
    <div class="card">
        <div class="card-header bg-brand text-center" style="background:black">
            {{ __("Duración total: :time", ["time" => $curso->totalTime()]) }}
        </div>
        <div class="card-body p-0">
            @php $index = 1 @endphp
            <h4 class="title">Lecciones</h4>
                @forelse($curso->lecciones as $leccion)
                    <div class="grid">
                    @switch($leccion->leccion_type)
                        @case(\App\Models\Leccion::ZIP)
                            <ul>
                                <li>
                                    <div class="title leccion">
                                    <a
                                    id="leccion-{{$index}}"
                                    href="#"
                                    class="text-black-50"
                                    data-type="{{ \App\Models\Leccion::ZIP }}"
                                    data-leccion="{{ $leccion }}"
                                    data-index="{{ $index }}"
                                    >
                                    <i class="fa fa-file-zip-o"></i> {{ $leccion->title_leccion }}
                                    </div>
                                </li>
                            </ul>
                            @break
                        @case(\App\Models\Leccion::VIDEO)
                            <ul>
                                <li>
                                    <div class="title leccion">
                                    <a
                                        id="leccion-{{$index}}"
                                        href="#"
                                        class="text-black-50"
                                        data-type="{{ \App\Models\Leccion::VIDEO }}"
                                        data-leccion="{{$leccion}}"
                                        data-index="{{ $index }}"
                                    >
                                        <i class="fa fa-file-video-o"></i> {{ $leccion->title_leccion }}
                                    </a>
                                    </div>
                                </li>
                            </ul>
                        @break
                    @endswitch
            @empty
                <div class="empty-results">
                    {!! __("No hay nada todavía") !!}
                </div>
            @endforelse
                    </div>
            @can('review', $curso)
            <div class=" text-center">
                <a
                    href="{{route('reviews.create', ['curso' => $curso])}}"
                    class="site-btn btn-block"
                >
                {{ __("Valorar el curso") }}
                    <span class="sspd_review ">
                    <ul class="mc_review fn-414">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-star yellow"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-star yellow"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-star yellow"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-star yellow"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-star yellow"></i></a></li> 
                    </ul>
                    </span>
                </a>
            </div>
            @endcan
        </div>
    </div>
</div>


@push("js")
<script>
    let index = null;
    jQuery(document).ready(function () {
        jQuery(".leccion").on("click", function (e) {
            e.preventDefault();
            const link = $(this).find("a");
            $(".leccion").removeClass("leccion-selected");
            $(this).addClass("leccion-selected");
            index = link.data("index");
            const leccion = link.data("leccion");
            const type = link.data("type");
            console.log(type);
            console.log(leccion.title_leccion);
            const visorHeader = $("#visor-card .card-header");
            const visorBody = $("#visor-card .card-body");
            const visorFooter = $("#visor-card .card-footer");
            const downloadText = '{{ __("Descargar") }}';
            const prevleccionText = '{{ __("Anterior lección") }}';
            const nextleccionText = '{{ __("Siguiente lección") }}';
            visorHeader.text(leccion.title_leccion);
            if (type === '{{ \App\Models\Leccion::ZIP }}') {
                const url = `/storage/lecciones/${leccion.title_leccion}/${leccion.file}`;
                const html = `
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="90%">${leccion.file}</td>
                                <td><a href="#" onclick="window.location.href = '${url}'" target="_blank">${downloadText}</a></td>
                            </tr>
                        </tbody>
                    </table>
                `;
                visorBody.html(html);
            }
            if (type === '{{ \App\Models\Leccion::VIDEO }}') {
                const html = `
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="${leccion.url_video}"  height="500" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
               `;
                visorBody.html(html);
            }

            let footerButtons = '';
            if ($(`#leccion-${index+1}`).length) {
               let footerButtons = `
                  <button class="float-right loadNextLeccion">${nextLeccionText}</button>
               `;
            }
            if ($(`#leccion-${index-1}`).length) {
                footerButtons += `
                  <button class="loat-left loadPrevLeccion">${prevLeccionText}</button>
               `;
            }
            visorFooter.html(footerButtons);
        });

        const visor = $("#visor-card");
        visor.on("click", ".loadNextLeccion", function () {
            const nextIndex = index += 1;
            $(`#leccion-${nextIndex}`).click();
        });
        visor.on("click", ".loadPrevLeccion", function () {
            const prevIndex = index -= 1;
            $(`#leccion-${prevIndex}`).click();
        });
    })
</script>
@endpush
