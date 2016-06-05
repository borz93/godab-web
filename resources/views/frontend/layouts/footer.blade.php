<footer class="footer navbar-inverse">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <h5 class="footer-white-text">Enlaces</h5>
                <ul class="list-unstyled">
                    <li>{{link_to('/','Inicio')}}</li>
                    <li>{{link_to('noticias','Noticias')}}</li>
                    <li>{{link_to('analisis','Análisis')}}</li>
                    <li>{{link_to('articulos','Que y como tomar')}}</li>
                    <li>{{link_to('musica','Música')}}</li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-6">
                <h5 class="footer-white-text">Información</h5>
                <ul class="list-unstyled">
                    <li>{{link_to('contacto','Contacto')}}</li>
                    <li>{{link_to('sobre','Sobre la web')}}</li>
                    <li>{{link_to('/','Servicios')}}</li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <h5 class="footer-white-text">Redes sociales</h5>
                <ul class="social-network social-square">
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus fa-3x"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center">
        <p>© 2016 Copyright:{!! link_to('/','Godab.es') !!}</p>
    </div>
</footer>