        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                    	<i name="menu-outline" class="fas fa-bars nav__toggle" id="nav-toggle"></i>
                        
                    </div>
                    
                    
                    <div class="nav__list">
                        <a href="index.php?pid=<?php echo base64_encode("ui/acudiente/sesionAcudiente.php") ?>" class="nav__link active">
                            <i name="home-outline" class="fas fa-home nav__icon"></i>
                            
                            <span class="nav__name">Inicio</span>
                        </a>
                        
                        
                        
                        <div  class="nav__link"  style="grid-template-columns: 20px max-content 1fr;">
                            <i class="fas fa-user-edit nav__icon"></i>
                            <span class="nav__name">Academia</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="index.php?pid=<?php echo base64_encode("ui/acudiente/listaEstudiantes.php") ?>" class="collapse__sublink">Calificaciones</a>
                                <a href="index.php?pid=<?php echo base64_encode("ui/acudiente/listadoProfesorPorEstudiante.php") ?>" class="collapse__sublink">Docentes</a>
                                <a href="index.php?pid=<?php echo base64_encode("ui/acudiente/listaEstudiantesObs.php") ?>" class="collapse__sublink">Obervador</a>
                            </ul>
                        </div>
                        <a href="#" class="nav__link" style="color: var(--white-color);text-decoration: none;" >
                            <i class="fas fa-calendar-alt nav__icon"></i>
                            <span class="nav__name">Horario</span>
                        </a>

                        <a href="index.php?pid=<?php echo base64_encode("ui/cita/insertCita.php") ?>" class="nav__link" style="color: var(--white-color);text-decoration: none;">
                            <i class="fas fa-calendar-plus fa-lg nav__icon" ></i>
                            <span class="nav__name">Solicitar Cita</span>
                        </a>
                        
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
                            <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Archivos</span>
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

