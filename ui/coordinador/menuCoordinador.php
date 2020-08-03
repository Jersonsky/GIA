        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                    	<i name="menu-outline" class="fas fa-bars nav__toggle" id="nav-toggle"></i>
                        
                    </div>
                    
                    
                    <div class="nav__list">
                        <a href="index.php?pid=<?php echo base64_encode("ui/coordinador/sesionCoordinador.php") ?>" class="nav__link active">
                            <i name="home-outline" class="fas fa-home nav__icon"></i>
                            
                            <span class="nav__name">INICIO</span>
                        </a>
                        
                        <div  class="nav__link"  style="grid-template-columns: 20px max-content 1fr;">
                            <i class="fas fa-user-plus nav__icon"></i>
                            <span class="nav__name">Agregar</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="index.php?pid=<?php echo base64_encode("ui/estudiante/insertEstudiante.php") ?>" class="collapse__sublink">Estudiante</a>
                                <a href="index.php?pid=<?php echo base64_encode("ui/profesor/insertProfesor.php") ?>" class="collapse__sublink">Profesor</a>
                                <a href="index.php?pid=<?php echo base64_encode("ui/acudiente/insertAcudiente.php") ?>" class="collapse__sublink">Acudiente</a>
                                <a href="#" class="collapse__sublink">Curso</a>
                            </ul>
                        </div>
                        <a href="#" class="nav__link" style="color: var(--white-color);text-decoration: none;" >
                             <i class="fas fa-calendar-week nav__icon"></i>
                            <span class="nav__name">Agregar Horario</span>
                        </a>

                        <div  class="nav__link"  style="grid-template-columns: 20px max-content 1fr;">
                            <i class="fas fa-book-reader nav__icon"></i>
                            <span class="nav__name">Listados</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Cursos</a>
                                <a href="#" class="collapse__sublink">Estudiantes</a>
                            </ul>
                        </div>
                        
                         <div  class="nav__link"  style="grid-template-columns: 20px max-content 1fr;">
                            <i class="fas fa-user-edit nav__icon"></i>
                            <span class="nav__name">Perfil</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Cambiar Perfil</a>
                                <a href="#" class="collapse__sublink">Cambiar Contrase&ntilde;a</a>
                            </ul>
                        </div>
                        
                        <a href="#" class="nav__link" style="color: var(--white-color);text-decoration: none;">
                            <i class="fas fa-calendar-day nav__icon"></i>
                            <span class="nav__name">Ver Citas</span>
                        </a>
                    </div>
                </div>

                <a href="index.php?logOut=1" class="nav__link" style="color: var(--white-color);text-decoration: none;">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Cerrar Sesi&oacute;n</span>
                </a>
            </nav>
        </div>
        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>

