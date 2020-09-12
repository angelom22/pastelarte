<li><p>Compartir en:</p></li>
<li><a href="https://www.facebook.com/sharer.php?u={{Request::fullUrl()}}&title={{$description}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text={{$description}}&via={{config('app.name')}}&hashtags=PartelArte" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="https://api.whatsapp.com/send?phone={+593980877300}&text={{$description}}%20{{Request::fullUrl()}}" target="_blank"><i class="fa fa-phone"></i></a></li>