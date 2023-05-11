DROP DATABASE IF EXISTS shapeupsql;
CREATE DATABASE shapeupsql CHARACTER SET utf8mb4;
USE shapeupsql;

--
-- Base de datos: `shapeupsql`
--

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `suscriptions`
--

INSERT INTO `suscriptions` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gratuita', 'Suscripción gratuita', 0, NOW(), NOW()),
(2, 'SuperShapeUp', 'Suscripción SuperShapeUp', 4.99, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `email_verified_at`, `status`, `country`, `age`, `height`, `weight`, `photo`, `biography`, `experience`, `suscription_id`, `remember_token`, `created_at`, `updated_at`) VALUES 
(1, 'Mario Rufo', 'mariorufo', '$2a$12$p57BZT0cjQeKfUwMGI3efuFWJ0pMxK2wW9ttPbkPJRi6g.mVDRYYy', 'mario.admin@shapeup.com', NOW(), 'Admin', 'España', null, null, null, null, null, null, 2, null, NOW(), NOW()),
(2, 'Manuel Moya', 'manuelmoya', '$2a$12$NL5BJzESTRJ3aeE2WHrWf.kfzRNcIhBYfGAUjYLsZLlIeVU.NJlNG', 'manuel.admin@shapeup.com', NOW(), 'Admin', 'España', null, null, null, null, null, null, 2, null, NOW(), NOW()),
(3, 'José Fernández', 'josefernandez', '$2a$12$gN7dKWejwuXhXkX4BT.3JOqUBWcxJ.BXg9MFWUDhqp/gRT1kpc12a', 'jose.admin@gmail.com', NOW(), 'Admin', 'España', null, null, null, null, null, null, 2, null, NOW(), NOW()),
(4, 'Javier García', 'javiergarcia', '$2a$12$K2Hn.stc85VAdD64qs5VRuLrg2S1l2upFywoii76VbK1qoQ9Pn9o.', 'javier.garcia@gmail.com', NOW(), 'User', 'España', 30, 180, 80, null, null, null, 1, null, NOW(), NOW()),
(5, 'Sofía Hernández', 'sofiahernandez', '$2a$12$5z8K5TsAey1slm5GdgASzO6JHwQKwHr0UxPAOIE.FWspyQyt6fX1a', 'sofia.hernandez@gmail.com', NOW(), 'User', 'México', 28, 165, 65, null, null, null, 1, null, NOW(), NOW()),
(6, 'Diego Gómez', 'diegogomez', '$2a$12$pS9s5Q1lx8B6o2oLOZMATuLku2JlgURs5a68ZOBcWgoXBXoEOU30.', 'diego.gomez@gmail.com', NOW(), 'User', 'Colombia', 35, 175, 75, null, null, null, 2, null, NOW(), NOW()),
(7, 'Marta Fernández', 'martafernandez', '$2a$12$t5Q5KjkkQZW5JM.Rgl.uC.MVKMMp2ktFfLgidIVYB8FUcNI1V5xGK', 'marta.fernandez@gmail.com', NOW(), 'User', 'España', 25, 160, 55, null, null, null, 1, null, NOW(), NOW()),
(8, 'Carlos Sánchez', 'carlossanchez', '$2a$12$IfX9oQfAb.jmOr55QTGVMeJ8uGPlZ9a0qMPMy55RUpGIPA/xzwF/G', 'carlos.sanchez@gmail.com', NOW(), 'User', 'México', 32, 185, 85, null, null, null, 1, null, NOW(), NOW()),
(9, 'Ana Martínez', 'anamartinez', '$2a$12$Ah3sQNdyDjMoByja9CbCdO3vZ1LKjEpFIID6oP9WYln.f47aPYveq', 'ana.martinez@gmail.com', NOW(), 'User', 'España', 29, 170, 70, null, null, null, 2, null, NOW(), NOW()),
(10, 'Rubén López', 'rubenlopez', '$2a$12$QL8EUyuhzupZQZb4U7ABV.c8MnWpPNb8oIHB.zRCO3i2pRdGly7XO', 'ruben.lopez@gmail.com', NOW(), 'User', 'España', 27, 175, 75, null, null, null, 1, null, NOW(), NOW()),
(11, 'María Torres', 'mariatorres', '$2a$12$XkkKTIYTSzDMlRTi5VNbbe4WC7N4ZSw.l2Uk98er7xHfuzhjsllZq', 'maria.torres@gmail.com', NOW(), 'User', 'España', 31, 170, 60, null, null, null, 1, null, NOW(), NOW()),
(12, 'Alejandro Ruiz', 'alejandroruiz', '$2a$12$gnLTBIeLyXpOZWS6zsDe2eJUDz3du9RQ2V.aJ466L2qfj8JwEDejG', 'alejandro.ruiz@gmail.com', NOW(), 'User', 'México', 29, 175, 70, null, null, null, 2, null, NOW(), NOW()),
(13, 'Laura García', 'lauragarcia', '$2a$12$WCJ2h1GNcjf9enfYCeYP/.6tJliPeVcE0EIGVHauE32FXjiQ94bYy', 'laura.garcia@gmail.com', NOW(), 'User', 'España', 26, 165, 55, null, null, null, 1, null, NOW(), NOW()),
(14, 'Jorge Gutiérrez', 'jorgegutierrez', '$2a$12$ovvzTIQvr6O1NgCjIMoMc.zJWU5KQRY4Jp6qSdMXMI5nS18fXDElG', 'jorge.gutierrez@gmail.com', NOW(), 'User', 'España', 33, 180, 85, null, null, null, 1, null, NOW(), NOW()),
(15, 'Carmen Moreno', 'carmenmoreno', '$2a$12$pIPLhf62t55Yvfof/74CsubTGf9fo6h.508Sl.7zsyhR91HRBMC/2', 'carmen.moreno@gmail.com', NOW(), 'User', 'España', 30, 170, 65, null, null, null, 1, null, NOW(), NOW()),
(16, 'Juan Martín', 'juanmartin', '$2a$12$/VoXOfXCCAlZv593NbCdteYi6jdfGWfOhaU0.BT.PhUKvmptdXABO', 'juan.martin@gmail.com', NOW(), 'User', 'España', 28, 175, 75, null, null, null, 2, null, NOW(), NOW()),
(17, 'Lucía García', 'luciagarcia', '$2a$12$.eZUyX5nSgzLpdKcA1..V.kZDuSBf4uuT8YXhIIrIqed0KrW76OHi', 'lucia.garcia@gmail.com', NOW(), 'User', 'España', 27, 165, 60, null, null, null, 1, null, NOW(), NOW()),
(18, 'Antonio Ruiz', 'antonioruiz', '$2a$12$Bl6arVxWy6.9FzfQZ4H6X.U1K4jI5hxhgJH0ODXDhWBiz8J0b4pLa', 'antonio.ruiz@gmail.com', NOW(), 'User', 'Argentina', 31, 180, 80, null, null, null, 1, null, NOW(), NOW()),
(19, 'Cristina González', 'cristinagonzalez', '$2a$12$kLKpGkKkwumkS2hLSRt2HOEMFD4s4v1MHpvSHNbUbIyEd7i7ss2dW', 'cristina.gonzalez@gmail.com', NOW(), 'User', 'España', 29, 170, 65, null, null, null, 1, null, NOW(), NOW()),
(20, 'Miguel López', 'miguellopez', '$2a$12$bd1ntx05wGbYhjg4Mc1m/eCs2JuUDcGoy8eXHbCTWufPlwPw.VJtG', 'miguel.lopez@gmailgmail.com', NOW(), 'User', 'España', 35, 175, 75, null, null, null, 1, null, NOW(), NOW()),
(21, 'Isabel Fernández', 'isabelfernandez', '$2a$12$TjyXJQFCz7Iw.QKcTz8eVOAU1/WUBJDRyFgAY5.4xKmw5Ih1OdqwO', 'isabel.fernandez@gmail.com', NOW(),'User', 'España', 25, 160, 55, null, null, null, 2, null, NOW(), NOW()),
(22, 'Francisco Sánchez', 'franciscosanchez', '$2a$12$5BhdWSVp6ZqjHMFZ2YTrS.ugCpCDNDSJiHauPt5.6xR0RT6.jwYnC', 'francisco.sanchez@gmail.com', NOW(), 'User', 'España', 32, 185, 85, null, null, null, 1, null, NOW(), NOW()),
(23, 'Pablo García', 'pablogarcia', '$2a$12$gxRsg95aYRCmb8AJB4HkNOw0CnZiPceIIjEFMs4TOV45ESot09llW', 'pablo.garcia@gmail.com', NOW(), 'User', 'España', 27, 175, 75, null, null, null, 1, null, NOW(), NOW()),
(24, 'Laura Rodríguez', 'laurarodriguez', '$2a$12$.dFH6gODDAgIK2BZkcEy8uSECQE8jaYo6CNpazYXKG0LL5e8xiXNy', 'laura.rodriguez@coach.com', NOW(), 'Coach', 'España', 32, null, null, '1.jpg', 'Soy una entrenadora personal con un enfoque en el entrenamiento de fuerza, la nutrición deportiva y su bienestar.', '6 años', 2, null, NOW(), NOW()),
(25, 'Pedro Martínez', 'pedromartinez', '$2a$12$kY1SOu8Ef7i9YADA4t2JMO0j.ysik9yF0qhrq3JEs6t/KrMrgonm6', 'pedro.martinez@coach.com', NOW(), 'Coach', 'México', 39, null, null, '2.jpg', 'Soy un entrenador personal certificado con más de 10 años de experiencia en el entrenamiento de fuerza y el acondicionamiento físico.', '10 años', 2, null, NOW(), NOW()),
(26, 'Marcela Díaz', 'marceladiaz', '$2a$12$DmtoVViMYZQHD0yY3Avb9u3OgsOZ6JdM7/RnxkpsT.U7vtt6FRsaC', 'marcela.diaz@coach.com', NOW(), 'Coach', 'México', 27, null, null, '3.jpg', 'Soy una entrenadora personal certificada con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '4 años', 2, null, NOW(), NOW()),
(27, 'Daniel Ramírez', 'danielramirez', '$2a$12$K2QPWE2SnsFdu67SZqtCcObUSuFwAEselfyPhnCrckPFDvOPab6BG', 'daniel.ramirez@coach.com', NOW(), 'Coach', 'Estados Unidos', 31, null, null, '4.jpg', 'Soy un entrenador personal especializado en el entrenamiento de alta intensidad, la pérdida de peso y la nutrición deportiva.', '7 años', 2, null, NOW(), NOW()),
(28, 'Javier Fernández', 'javierfernandez', '$2a$12$xX2KSBu2eQ3WhOYdekYmheBajoKCVPJItQFkUK6Osp/pNL4MEXwpZW', 'javier.fernandez@coach.com', NOW(), 'Coach', 'España', 35, null, null, '5.jpg', 'Soy un entrenador personal certificado con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '9 años', 2, null, NOW(), NOW()),
(29, 'Marta Gutiérrez', 'martagutierrez', '$2a$12$VsWNs25ZEbneNQf1ghi4FenhZei9nmxl09SwwPuJk7L5.SWKCIJlO', 'marta.gutierrez@coach.com', NOW(), 'Coach', 'España', 29, null, null, '6.jpg', 'Soy una entrenadora personal con experiencia en el entrenamiento de fuerza y el acondicionamiento físico. Mi objetivo es ayudar a las personas a mejorar su salud.', '5 años', 2, null, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Altair Sport', '1.jpg',  NOW(), NOW()),
(2, 'GO Fit', '2.png',  NOW(), NOW()),
(3, 'Inacua', '3.png',  NOW(), NOW()),
(4, 'MC Fit', '4.png',  NOW(), NOW()),
(5, 'Metropilian', '5.png', NOW(), NOW()),
(6, 'O2 Centro Wellness', '6.png',  NOW(), NOW()),
(7, 'Sato Sport', '7.png',  NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `supermarkets`
--

INSERT INTO `supermarkets` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Aldi', '1.png',  NOW(), NOW()),
(2, 'Carrefour', '2.png',  NOW(), NOW()),
(3, 'Corte Inglés', '3.png',  NOW(), NOW()),
(4, 'Coviran', '4.png',  NOW(), NOW()),
(5, 'Dia', '5.png',  NOW(), NOW()),
(6, 'Lidl', '6.png',  NOW(), NOW()),
(7, 'Mas', '7.png',  NOW(), NOW()),
(8, 'Mercadona', '8.png',  NOW(), NOW()),
(9, 'Supersol', '9.png',  NOW(), NOW());

-- --------------------------------------------------------
/* ENTRENAMIENTOS Y EJERCICIOS */
-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `categories_of_trainings`
--

INSERT INTO `categories_of_trainings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento de fuerza', NOW(), NOW()),
(2, 'Entrenamiento de aumento de masa muscular', NOW(), NOW()),
(3, 'Entrenamiento de perdida de peso', NOW(), NOW()),
(4, 'Entrenamiento de flexibilidad', NOW(), NOW()),
(5, 'Entrenamiento de equilibrio y coordinación', NOW(), NOW()),
(6, 'Entrenamiento de velocidad y agilidad', NOW(), NOW());

--
-- Volcado de datos para la tabla `tags_of_exercises`
--

INSERT INTO `tags_of_exercises` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pecho',  NOW(), NOW()),
(2, 'Espalda',  NOW(), NOW()),
(3, 'Piernas',  NOW(), NOW()),
(4, 'Brazos',  NOW(), NOW()),
(5, 'Hombros',  NOW(), NOW()),
(6, 'Abdominales',  NOW(), NOW()),
(7, 'Glúteos',  NOW(), NOW()),
(8, 'Cardio',  NOW(), NOW()),
(9, 'Fuerza',  NOW(), NOW()),
(10, 'Equilibrio', NOW(), NOW()),
(11, 'Estiramientos',  NOW(), NOW()),
(12, 'Flexibilidad',  NOW(), NOW()),
(13, 'Pliometría',  NOW(), NOW()),
(14, 'Agilidad',  NOW(), NOW()),
(15, 'Cordinación',  NOW(), NOW()),
(16, 'Movilidad',  NOW(), NOW()),
(17, 'Peso corporal',  NOW(), NOW()),
(18, 'Resistencia',  NOW(), NOW()),
(19, 'Velocidad',  NOW(), NOW()),
(20, 'Potencia',  NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `description`, `duration`, `level`, `user_coach_id`, `category_of_training_id`,  `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad.', 60, 'Alto', 24, 1, NOW(), NOW()),
(2, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad.', 45, 'Medio', 24, 1, NOW(), NOW()),
(3, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen.', 60, 'Alto', 24, 2, NOW(), NOW()),
(4, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes.', 45, 'Bajo', 24, 3, NOW(), NOW()),
(5, 'Entrenamiento de flexibilidad', 'Mejora tu flexibilidad y amplitud de movimiento con este entrenamiento enfocado en estiramientos.', 45, 'Medio', 24, 4, NOW(), NOW()),	
(6, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 50, 'Alto', 24, 5, NOW(), NOW()),
(7, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen.', 45, 'Bajo', 25, 2, NOW(), NOW()),
(8, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes.', 60, 'Medio', 25, 3, NOW(), NOW()),
(9, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 60, 'Medio', 25, 5, NOW(), NOW()),
(10, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad.', 45, 'Alto', 25, 6, NOW(), NOW()),
(11, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad.', 60, 'Bajo', 25, 6, NOW(), NOW()),
(12, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad.', 60, 'Bajo', 26, 1, NOW(), NOW()),
(13, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen.', 50, 'Bajo', 26, 2, NOW(), NOW()),
(14, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes.', 60, 'Medio', 26, 3, NOW(), NOW()),
(15, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad.', 60, 'Bajo', 26, 6, NOW(), NOW()),
(16, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad.', 60, 'Medio', 27, 1, NOW(), NOW()),
(17, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes.', 45, 'Alto', 27, 3, NOW(), NOW()),
(18, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 45, 'Medio', 27, 5, NOW(), NOW()),
(19, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 60, 'Bajo', 27, 5, NOW(), NOW()),
(20, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad.', 60, 'Alto', 27, 6, NOW(), NOW()),
(21, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad.', 50, 'Bajo', 28, 1, NOW(), NOW()),
(22, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen.', 60, 'Alto', 28, 2, NOW(), NOW()),
(23, 'Entrenamiento de flexibilidad', 'Mejora tu flexibilidad y amplitud de movimiento con este entrenamiento enfocado en estiramientos.', 60, 'Bajo', 28, 4, NOW(), NOW()),
(24, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 45, 'Alto', 28, 5, NOW(), NOW()),
(25, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad.', 45, 'Bajo', 28, 6, NOW(), NOW()),
(26, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen.', 45, 'Medio', 29, 2, NOW(), NOW()),
(27, 'Entrenamiento de flexibilidad', 'Mejora tu flexibilidad y amplitud de movimiento con este entrenamiento enfocado en estiramientos.', 45, 'Alto', 29, 4, NOW(), NOW()),
(28, 'Entrenamiento de flexibilidad', 'Mejora tu flexibilidad y amplitud de movimiento con este entrenamiento enfocado en estiramientos.', 60, 'Medio', 29, 4, NOW(), NOW()),
(29, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento para aumentar la estabilidad.', 45, 'Medio', 29, 5, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `duration`, `repetitions`, `series`, `explanatory_video`, `tag_of_exercise_id`, `user_coach_id`, `created_at`, `updated_at`) VALUES
/* COACH 24 */
(1, 'Sentadillas con barra', 45, 10, 4, 'https://www.youtube.com/watch?v=3fvw0FIGYF4', 3, 24, NOW(), NOW()),
(2, 'Prensa de piernas', 60, 10, 4, 'https://www.youtube.com/watch?v=S6nnM60yjqk', 3, 24, NOW(), NOW()),
(3, 'Press de banca', 45, 10, 4, 'https://www.youtube.com/watch?v=JhcjQHkjklA', 1, 24, NOW(), NOW()),
(4, 'Remo con barra', 30, 10, 4, 'https://www.youtube.com/watch?v=3uiWjik2yEQ', 2, 24, NOW(), NOW()),
(5, 'Levantamiento de peso muerto', 45, 10, 4, 'https://www.youtube.com/watch?v=7KL8SgCP4KQ', 3, 24, NOW(), NOW()),
(6, 'Press militar', 45, 10, 4, 'https://www.youtube.com/watch?v=o5M9RZ-vWrc', 5, 24, NOW(), NOW()),
(7, 'Dominadas', 45, 10, 4, 'https://www.youtube.com/watch?v=94LjCdfkQ-0', 2, 24, NOW(), NOW()),
(8, 'Zancadas con mancuernas', 45, 10, 4, 'https://www.youtube.com/watch?v=Uw56z6JdWGY', 3, 24, NOW(), NOW()),
(9, 'Curl de bíceps con mancuernas', 30, 10, 4, 'https://www.youtube.com/watch?v=uICWtGLd4-I', 4, 24, NOW(), NOW()),
(10, 'Extensión de tríceps con mancuernas', 30, 10, 4, 'https://www.youtube.com/watch?v=-paLAzl68WU', 4, 24, NOW(), NOW()),
(11, 'Press de banca con mancuernas', 30, 12, 4, 'https://www.youtube.com/watch?v=jrDDz7x1Dpo', 1, 24, NOW(), NOW()),
(12, 'Remo con mancuernas', 30, 12, 4, 'https://www.youtube.com/watch?v=EiGN5ohOYOc', 2, 24, NOW(), NOW()),
(13, 'Press de hombros con mancuernas', 30, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 5, 24, NOW(), NOW()),
(14, 'Saltos de tijera', 120, 30, 4, 'https://www.youtube.com/watch?v=iO8srE_cz3s', 15, 24, NOW(), NOW()),
(15, 'Burpees', 120, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 3, 24, NOW(), NOW()),
(16, 'Caminadora inclinada', 1200, 1, 1, 'https://www.youtube.com/watch?v=jNIKxC69HGc', 8, 24, NOW(), NOW()),
(17, 'Entrenamiento de intervalos de alta intensidad (HIIT)', 1200, 1, 4, 'https://www.youtube.com/watch?v=P1HyMCX8NJs', 8, 24, NOW(), NOW()),
(18, 'Sentadillas con salto', 1200, 30, 3, 'https://www.youtube.com/watch?v=P1HyMCX8NJs', 8, 24, NOW(), NOW()),
(19, 'Estiramientos de piernas', 600, 30, 3, 'https://www.youtube.com/watch?v=fHvJvnGxH3U', 12, 24, NOW(), NOW()),
(20, 'Estiramiento de espalda', 300, 30, 3, 'https://www.youtube.com/watch?v=w2MJJ4gj644', 12, 24, NOW(), NOW()),
(21, 'Estiramiento de cuello', 300, 30, 3, 'https://www.youtube.com/watch?v=stQ4yI44Law', 12, 24, NOW(), NOW()),
(22, 'Estiramiento de hombros', 300, 30, 3, 'https://www.youtube.com/watch?v=OLtUiP0XC4Q', 12, 24, NOW(), NOW()),
(23, 'Estiramientos de brazos', 600, 30, 3, 'https://www.youtube.com/watch?v=4W-xie4ZOfs&t=318s', 12, 24, NOW(), NOW()),
(24, 'Paso de bailarina', 30, 1, 3, 'https://www.youtube.com/watch?v=r5FzpRvQkk0', 15, 24, NOW(), NOW()),
(25, 'Caminata en el cable', 60, 10, 3, 'https://www.youtube.com/watch?v=zTFG6gScuD0', 10, 24, NOW(), NOW()),
(26, 'Bosu Ball Squat', 45, 12, 3, 'https://www.youtube.com/watch?v=2eyUkrPt9R0', 10, 24, NOW(), NOW()),
(27, 'Paso lateral con cono', 30, 10, 3, 'https://www.youtube.com/watch?v=3yEbnTC890Q', 15, 24, NOW(), NOW()),
(28, 'Sentadilla en una pierna', 30, 10, 3, 'https://www.youtube.com/watch?v=ILO0S9wPNwI', 10, 24, NOW(), NOW()),

/* COACH 25 */
(29, 'Sentadillas con barra', 15, 10, 4, 'https://www.youtube.com/watch?v=ILO0S9wPNwI', 3, 25, NOW(), NOW()),
(30, 'Press de banca', 30, 12, 4, 'https://www.youtube.com/watch?v=dWV4uWd2GvM', 1, 25, NOW(), NOW()),
(31, 'Peso muerto', 20, 10, 4, 'https://www.youtube.com/watch?v=Y1Feac6SHPI', 3, 25, NOW(), NOW()),
(32, 'Elevación de pantorrillas', 30, 15, 4, 'https://www.youtube.com/watch?v=iS1VtOd2bGQ', 3, 25, NOW(), NOW()),
(33, 'Curl de bíceps con mancuernas', 45, 12, 4, 'https://www.youtube.com/watch?v=qERAhN-qpaU', 4, 25, NOW(), NOW()),
(34, 'Sentadillas con salto', 30, 12, 4, 'https://www.youtube.com/watch?v=IiHH0EWo8-k', 3, 25, NOW(), NOW()),
(35, 'Zancadas con salto', 30, 12, 4, 'https://www.youtube.com/watch?v=Gd4H2uKDHIg', 8, 25, NOW(), NOW()),
(36, 'Burpees', 30, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 3, 25, NOW(), NOW()),
(37, 'Mountain climbers', 60, 30, 3, 'https://www.youtube.com/watch?v=1bSqG-4bIg4', 8, 25, NOW(), NOW()),
(38, 'Saltos de tijera', 60, 20, 3, 'https://www.youtube.com/watch?v=V6UJW6wqV6g', 8, 25, NOW(), NOW()),
(39, 'Caminar sobre una línea', 30, 1, 3, 'https://www.youtube.com/watch?v=sK6FqLSVb2A', 8, 25, NOW(), NOW()),
(40, 'Equilibrio sobre una pierna', 60, 1, 3, 'https://www.youtube.com/watch?v=_3Z2lc_Om7k', 10, 25, NOW(), NOW()),
(41, 'Saltos laterales con cono', 30, 20, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 10, 25, NOW(), NOW()),
(42, 'Caminar en el lugar con ojos cerrados', 60, 1, 3, 'https://www.youtube.com/watch?v=RkRbx5e3Kc0', 10, 25, NOW(), NOW()),
(43, 'Malabarismo con pelota', 60, 1, 3, 'https://www.youtube.com/watch?v=6pmz5PYEsBE', 10, 25, NOW(), NOW()),
(44, 'Sprint', 15, 5, 5, 'https://www.youtube.com/watch?v=4u8c24sGGg8', 19, 25, NOW(), NOW()),
(45, 'Salto de caja', 30, 10, 3, 'https://www.youtube.com/watch?v=Y7oZdwP-mcY', 14, 25, NOW(), NOW()),
(46, 'Escalera de agilidad', 45, 3, 5, 'https://www.youtube.com/watch?v=AxopJJ-_hzY', 14, 25, NOW(), NOW()),
(47, 'Plyo push-ups', 20, 5, 4, 'https://www.youtube.com/watch?v=QlsBDcMK9EY', 14, 25, NOW(), NOW()),
(48, 'Salto de vallas', 30, 10, 3, 'https://www.youtube.com/watch?v=z6PaNxw0bE8', 14, 25, NOW(), NOW()),
(49, 'Correr zigzag', 60, 10, 3, 'https://www.youtube.com/watch?v=cJ6KtDK1fYI', 19, 25, NOW(), NOW()),
(50, 'Saltos laterales', 30, 10, 3, 'https://www.youtube.com/shorts/a2kwZCrrz2c', 14, 25, NOW(), NOW()),
(51, 'Sprints hacia atrás', 30, 10, 3, 'https://www.youtube.com/shorts/l0M2C_tWW7E', 19, 25, NOW(), NOW()),
(52, 'Saltos en cuclillas', 30, 10, 3, 'https://www.youtube.com/watch?v=rp_ZKQ1FZvM', 14, 25, NOW(), NOW()),

/* COACH 26 */
(53, 'Sentadillas', 30, 12, 3, 'https://www.youtube.com/watch?v=3fvw0FIGYF4&t=8s', 3, 26, NOW(), NOW()),
(54, 'Press de banca', 45, 10, 4, 'https://www.youtube.com/watch?v=dWV4uWd2GvM', 1, 26, NOW(), NOW()),
(55, 'Peso muerto', 60, 8, 5, 'https://www.youtube.com/watch?v=Y1Feac6SHPI', 3, 26, NOW(), NOW()),
(56, 'Dominadas', 45, 8, 4, 'https://www.youtube.com/watch?v=94LjCdfkQ-0', 2, 26, NOW(), NOW()),
(57, 'Flexiones de brazos', 30, 12, 3, 'https://www.youtube.com/watch?v=24whjX_tS78', 4, 26, NOW(), NOW()),
(58, 'Sentadillas con barra', 60, 10, 3, 'https://www.youtube.com/watch?v=3fvw0FIGYF4&t=8s', 3, 26, NOW(), NOW()),
(59, 'Press de banca con mancuernas', 45, 8, 4, 'https://www.youtube.com/watch?v=jrDDz7x1Dpo', 1, 26, NOW(), NOW()),
(60, 'Dominadas con agarre ancho', 30, 8, 3, 'https://www.youtube.com/watch?v=ashv772miEw', 2, 26, NOW(), NOW()),
(61, 'Curl de bíceps con mancuernas',30, 10, 4, 'https://www.youtube.com/watch?v=qERAhN-qpaU&t=1s', 2, 26, NOW(), NOW()),
(62, 'Sentadillas con salto', 30, 12, 3, 'https://www.youtube.com/watch?v=IiHH0EWo8-k', 3, 26, NOW(), NOW()),
(63, 'Burpees', 30, 12, 3, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 8, 26, NOW(), NOW()),
(64, 'Zancadas con salto', 30, 12, 3, 'https://www.youtube.com/watch?v=Gd4H2uKDHIg', 3, 26, NOW(), NOW()),
(65, 'Saltos laterales', 30, 12, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 3, 26, NOW(), NOW()),
(66, 'Caminata en cinta', 1800, 1, 1, 'https://www.youtube.com/watch?v=-QlU5ewCDBc', 3, 1, NOW(), NOW()),
(67, 'Sprints de velocidad', 20, 5, 3 , 'https://www.youtube.com/watch?v=j_L1DWPZxlI', 19, 26, NOW(), NOW()),
(68, 'Saltos laterales', 30 , 10, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 19, 26, NOW(), NOW()),
(69, 'Escaleras de coordinación', 45, 2, 3, 'https://www.youtube.com/watch?v=PwO5TR3g6ic', 15, 26, NOW(), NOW()),
(70, 'Saltos de caja', 30, 5, 3, 'https://www.youtube.com/watch?v=Y7oZdwP-mcY', 3, 26, NOW(), NOW()),
(71, 'Arranques de potencia', 20, 8, 3, 'https://www.youtube.com/watch?v=89wH-6gBX4c', 19, 26, NOW(), NOW()),

/* COACH 27 */
(72, 'Sentadillas', 60, 12, 3, 'https://www.youtube.com/watch?v=BjixzWEw4EY', 3, 27, NOW(), NOW()),
(73, 'Press de banca', 45, 8, 4, 'https://www.youtube.com/watch?v=dWV4uWd2GvM', 1, 27,  NOW(), NOW()),
(74, 'Remo con barra', 60, 10, 4, 'https://www.youtube.com/watch?v=3uiWjik2yEQ', 2, 27,  NOW(), NOW()),
(75, 'Peso muerto', 60, 8, 3, 'https://www.youtube.com/watch?v=Y1Feac6SHPI', 3, 27,  NOW(), NOW()),
(76, 'Dominadas', 45, 6, 3, 'https://www.youtube.com/watch?v=94LjCdfkQ-0', 2, 27,  NOW(), NOW()),
(77, 'Sentadillas con salto', 30, 12, 3,'https://www.youtube.com/watch?v=IiHH0EWo8-k', 3, 27, NOW(), NOW()),
(78, 'Burpees', 45 , 10, 3, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 8, 27, NOW(), NOW()),
(79, 'Zancadas con mancuernas', 30, 12, 3, 'https://www.youtube.com/watch?v=Uw56z6JdWGY', 3, 27, NOW(), NOW()),
(80, 'Flexiones de brazos', 60 , 8, 3, 'https://www.youtube.com/watch?v=24whjX_tS78&t=384s', 4, 27, NOW(), NOW()),
(81, 'Plancha', 60 , 1, 3, 'https://www.youtube.com/watch?v=d0atctiI7Vw', 2, 27, NOW(), NOW()),
(82, 'Plancha lateral', 30 , 3, 3, 'https://www.youtube.com/watch?v=bRivOELQVOs', 2, 27, NOW(), NOW()),
(83, 'Paso lateral con giro', 30 , 10, 3, 'https://www.youtube.com/watch?v=uGFAarr1waA', 15, 27, NOW(), NOW()),
(84, 'Sentadilla en una pierna', 30, 10, 3 , 'https://www.youtube.com/watch?v=ILO0S9wPNwI&t=4s', 10, 27, NOW(), NOW()),
(85, 'Balanceo en una pierna', 30, 10, 3, 'https://www.youtube.com/watch?v=B8b_XlFeu3I', 10, 27, NOW(), NOW()),
(86, 'Tocar los dedos de los pies', 30, 10, 3, 'https://www.youtube.com/watch?v=04Vu32iZ0iY', 10, 27, NOW(), NOW()),
(87, 'Paso del patinador', 60 , 10, 3 , 'https://www.youtube.com/watch?v=_GENnmtzRxk', 10, 27, NOW(), NOW()),
(88, 'Paso del mono', 60, 10, 3, 'https://www.youtube.com/watch?v=gMpoOjjV0-s', 10, 27, NOW(), NOW()),
(89, 'Plancha lateral con elevación de pierna', 30, 10, 3, 'https://www.youtube.com/watch?v=zfiOU4yxLKo', 10, 27, NOW(), NOW()),
(90, 'Sentadillas con salto y giro', 60, 10 , 3 , 'https://www.youtube.com/watch?v=Yhp28YDReeU', 15, 27, NOW(), NOW()),
(91, 'Paso de comba', 60, 20, 4, 'https://www.youtube.com/watch?v=61viNRuLA1g', 15, 27, NOW(), NOW()),
(92, 'Saltos laterales', 30, 10, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 19, 27, NOW(), NOW()),
(93, 'Carrera con obstáculos', 60, 10 , 3, 'https://www.youtube.com/watch?v=s-uxMLF-6iA', 19, 27, NOW(), NOW()),
(94, 'Escalera de agilidad', 30, 10, 3, 'https://www.youtube.com/watch?v=AxopJJ-_hzY', 14, 27, NOW(), NOW()),
(95,'Saltos en profundidad', 60, 10, 3, 'https://www.youtube.com/watch?v=eV-O2lRJxr0', 14, 27, NOW(), NOW()),
(96,'Conos de velocidad', 60, 10, 3, 'https://www.youtube.com/watch?v=2ZRfq7SKW2w', 19, 27, NOW(), NOW()),

/* COACH 28 */
(97, 'Sentadillas con barra', 60, 10, 3, 'https://www.youtube.com/watch?v=3fvw0FIGYF4&t=9s', 3, 28, NOW(), NOW()),
(98, 'Press de banca con mancuernas', 45, 8, 4, 'https://www.youtube.com/watch?v=jrDDz7x1Dpo', 1, 28, NOW(), NOW()),
(99, 'Remo con mancuernas', 60, 12, 3, 'https://www.youtube.com/watch?v=EiGN5ohOYOc', 2, 28, NOW(), NOW()),
(100, 'Zancadas con mancuernas', 45, 10, 3, 'https://www.youtube.com/watch?v=Uw56z6JdWGY', 3, 28, NOW(), NOW()),
(101, 'Curl de bíceps con mancuernas', 30, 12, 4, 'https://www.youtube.com/watch?v=uICWtGLd4-I', 4, 28, NOW(), NOW()),
(102, 'Press de banca con barra', 45, 10, 3, 'https://www.youtube.com/watch?v=dWV4uWd2GvM&t=1s', 1, 28, NOW(), NOW()),
(103, 'Remo con barra', 60, 12, 3, 'https://www.youtube.com/watch?v=3uiWjik2yEQ', 2, 28, NOW(), NOW()),
(104, 'Peso muerto con barra', 60, 8, 4, 'https://www.youtube.com/watch?v=7KL8SgCP4KQ&t=1s', 3, 28, NOW(), NOW()),
(105, 'Press militar con barra', 45, 10, 3, 'https://www.youtube.com/watch?v=f3E1jQFRONs', 5, 28, NOW(), NOW()),
(106, 'Estiramiento de cuádriceps', 30 , 3, 3, 'https://www.youtube.com/watch?v=vQejbT95BzA', 3, 28, NOW(), NOW()),
(107, 'Estiramiento de isquiotibiales', 30, 3, 3 , 'https://www.youtube.com/watch?v=AN8eTwCfeL4', 3, 28, NOW(), NOW()),
(108, 'Estiramiento de glúteos', 30, 3, 3, 'https://www.youtube.com/watch?v=ettY0W0qswA', 7, 28, NOW(), NOW()),
(109, 'Estiramiento de pantorrillas', 30, 3, 3, 'https://www.youtube.com/watch?v=-hQcyy8GqtQ', 3, 28, NOW(), NOW()),
(110, 'Estiramiento de aductores', 30 , 3, 3, 'https://www.youtube.com/watch?v=T-_X9AJ4wnI', 3, 28, NOW(), NOW()),
(111, 'Sentadilla unipodal', 30, 3, 3, 'https://www.youtube.com/watch?v=P_7BSCTxaP4', 3, 28, NOW(), NOW()),
(112, 'Salto con giro', 30, 3, 3, 'https://www.youtube.com/watch?v=xytbbhilXGs', 15, 28, NOW(), NOW()),
(113, 'Elevación de rodillas', 30, 3, 3, 'https://www.youtube.com/watch?v=iBpgkuFuENY', 15, 28, NOW(), NOW()),
(114, 'Paso de lado con salto', 30, 3, 3, 'https://www.youtube.com/watch?v=ra4S5--YZR8', 10, 28, NOW(), NOW()),
(115, 'Plancha lateral con elevación de pierna', 30, 3 , 3, 'https://www.youtube.com/watch?v=zfiOU4yxLKo&t=66s', 10, 28, NOW(), NOW()),
(116, 'Sprints', 20, 10, 3, 'https://www.youtube.com/watch?v=4u8c24sGGg8&t=190s', 3, 28, NOW(), NOW()),
(117, 'Saltos de conejo', 30, 10, 3, 'https://www.youtube.com/watch?v=Ocn73njdai4', 3, 28, NOW(), NOW()),
(118, 'Circuito de obstáculos', 2, 1, 3, 'https://www.youtube.com/watch?v=s-uxMLF-6iA', 3, 28, NOW(), NOW()),
(119, 'Saltos laterales', 30 , 10, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 3, 28, NOW(), NOW()),
(120, 'Escalera de agilidad', 2, 1 , 3, 'https://www.youtube.com/watch?v=AxopJJ-_hzY', 14, 28, NOW(), NOW()),

/* COACH 29 */
(121, 'Sentadillas con barra', 45, 10, 4, 'https://www.youtube.com/watch?v=3fvw0FIGYF4&t=9s', 3, 29, NOW(), NOW()),
(122, 'Press de banca con mancuernas', 60, 10, 4, 'https://www.youtube.com/watch?v=jrDDz7x1Dpo', 1, 29, NOW(), NOW()),
(123, 'Peso muerto con barra', 55, 10, 4, 'https://www.youtube.com/watch?v=7KL8SgCP4KQ&t=1s', 3, 29, NOW(), NOW()),
(124, 'Remo con barra', 45, 10, 4, 'https://www.youtube.com/watch?v=3uiWjik2yEQ', 2, 29, NOW(), NOW()),
(125, 'Flexiones de brazos con peso', 40, 10, 4, 'https://www.youtube.com/watch?v=FvRebC-q5jQ', 1, 29, NOW(), NOW()),
(126,'Estiramientos de cuello', 30, 2, 3, 'https://www.youtube.com/watch?v=stQ4yI44Law', 11, 29, NOW(), NOW()),
(127,'Estiramiento de hombros', 30, 2, 3, 'https://www.youtube.com/watch?v=OLtUiP0XC4Q&t=234s', 11, 29, NOW(), NOW()),
(128,'Estiramiento de pierna', 30, 2, 3, 'https://www.youtube.com/watch?v=txsha7BIlDo', 11, 29, NOW(), NOW()),
(129,'Estiramiento de espalda baja', 30, 2, 3, 'https://www.youtube.com/watch?v=uejkZ4sWi3w', 11, 29, NOW(), NOW()),
(130,'Estiramiento de brazos y pecho', 30, 2, 3 , 'https://www.youtube.com/watch?v=RlMMUBpIzb4', 11, 29, NOW(), NOW()),
(131,'Estiramiento de isquiotibiales', 30, 2, 3, 'https://www.youtube.com/watch?v=AN8eTwCfeL4&t=502s', 11, 29, NOW(), NOW()),
(132,'Estiramiento de cuádriceps', 30, 2, 3, 'https://www.youtube.com/watch?v=SHHWGvm9Qyw', 11, 29, NOW(), NOW()),
(133,'Estiramiento de tobillos', 30, 2, 3, 'https://www.youtube.com/watch?v=H-3VqgEuSVk', 11, 29, NOW(), NOW()),
(134,'Estiramiento de glúteos', 30, 2, 3, 'https://www.youtube.com/watch?v=ettY0W0qswA&t=292s', 11, 29, NOW(), NOW()),
(135,'Estiramiento de caderas', 30, 2, 3, 'https://www.youtube.com/watch?v=JvFIcfNPsiQ', 11, 29, NOW(), NOW()),
(136, 'Equilibrio sobre un pie', 30, 2, 3, 'https://www.youtube.com/watch?v=uGS7PzNij2c', 10, 29, NOW(), NOW()),
(137, 'Saltos laterales', 30, 2, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 15, 29, NOW(), NOW()),
(138, 'Elevación de talones', 30, 2, 3, 'https://www.youtube.com/watch?v=hBS3yt6nY9s', 10, 29, NOW(), NOW()),
(139, 'Paso de vallas', 30 , 2, 3, 'https://www.youtube.com/watch?v=93VgZSjdr4I', 15, 29, NOW(), NOW()),
(140, 'Desplazamiento lateral con cono', 30, 2, 3, 'https://www.youtube.com/watch?v=gibpTNvhoa8', 15, 29, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `training_exercises`
--

INSERT INTO `training_exercises` (`id`, `training_id`, `exercise_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NOW(), NOW()),
(2, 1, 2, NOW(), NOW()),
(3, 1, 3, NOW(), NOW()),
(4, 1, 4, NOW(), NOW()),
(5, 1, 5, NOW(), NOW()),
(6, 2, 6, NOW(), NOW()),
(7, 2, 7, NOW(), NOW()),
(8, 2, 8, NOW(), NOW()),
(9, 2, 9, NOW(), NOW()),
(10, 2, 10, NOW(), NOW()),
(11, 3, 1, NOW(), NOW()),
(12, 3, 11, NOW(), NOW()),
(13, 3, 12, NOW(), NOW()),
(14, 3, 13, NOW(), NOW()),
(15, 3, 9, NOW(), NOW()),
(16, 4, 14, NOW(), NOW()),
(17, 4, 15, NOW(), NOW()),
(18, 4, 16, NOW(), NOW()),
(19, 4, 17, NOW(), NOW()),
(20, 4, 18, NOW(), NOW()),
(21, 5, 19, NOW(), NOW()),
(22, 5, 20, NOW(), NOW()),
(23, 5, 21, NOW(), NOW()),
(24, 5, 22, NOW(), NOW()),
(25, 5, 23, NOW(), NOW()),
(26, 6, 24, NOW(), NOW()),
(27, 6, 25, NOW(), NOW()),
(28, 6, 26, NOW(), NOW()),
(29, 6, 27, NOW(), NOW()),
(30, 6, 28, NOW(), NOW()),
(31, 7, 29, NOW(), NOW()),
(32, 7, 30, NOW(), NOW()),
(33, 7, 31, NOW(), NOW()),
(34, 7, 32, NOW(), NOW()),
(35, 7, 33, NOW(), NOW()),
(36, 8, 34, NOW(), NOW()),
(37, 8, 35, NOW(), NOW()),
(38, 8, 36, NOW(), NOW()),
(39, 8, 37, NOW(), NOW()),
(40, 8, 38, NOW(), NOW()),
(41, 9, 39, NOW(), NOW()),
(42, 9, 40, NOW(), NOW()),
(43, 9, 41, NOW(), NOW()),
(44, 9, 42, NOW(), NOW()),
(45, 9, 43, NOW(), NOW()),
(46, 10, 44, NOW(), NOW()),
(47, 10, 45, NOW(), NOW()),
(48, 10, 46, NOW(), NOW()),
(49, 10, 47, NOW(), NOW()),
(50, 10, 36, NOW(), NOW()),
(51, 11, 48, NOW(), NOW()),
(52, 11, 49, NOW(), NOW()),
(53, 11, 50, NOW(), NOW()),
(54, 11, 51, NOW(), NOW()),
(55, 11, 52, NOW(), NOW()),
(56, 12, 53, NOW(), NOW()),
(57, 12, 54, NOW(), NOW()),
(58, 12, 55, NOW(), NOW()),
(59, 12, 56, NOW(), NOW()),
(60, 12, 57, NOW(), NOW()),
(61, 13, 58, NOW(), NOW()),
(62, 13, 59, NOW(), NOW()),
(63, 13, 55, NOW(), NOW()),
(64, 13, 60, NOW(), NOW()),
(65, 13, 61, NOW(), NOW()),
(66, 14, 62, NOW(), NOW()),
(67, 14, 63, NOW(), NOW()),
(68, 14, 64, NOW(), NOW()),
(69, 14, 65, NOW(), NOW()),
(70, 14, 66, NOW(), NOW()),
(71, 15, 67, NOW(), NOW()),
(72, 15, 68, NOW(), NOW()),
(73, 15, 69, NOW(), NOW()),
(74, 15, 70, NOW(), NOW()),
(75, 15, 71, NOW(), NOW()),
(76, 16, 72, NOW(), NOW()),
(77, 16, 73, NOW(), NOW()),
(78, 16, 74, NOW(), NOW()),
(79, 16, 75, NOW(), NOW()),
(80, 16, 76, NOW(), NOW()),
(81, 17, 78, NOW(), NOW()),
(82, 17, 79, NOW(), NOW()),
(83, 17, 80, NOW(), NOW()),
(84, 17, 81, NOW(), NOW()),
(85, 17, 82, NOW(), NOW()),
(86, 18, 83, NOW(), NOW()),
(87, 18, 84, NOW(), NOW()),
(88, 18, 85, NOW(), NOW()),
(89, 18, 86, NOW(), NOW()),
(90, 18, 87, NOW(), NOW()),
(91, 19, 88, NOW(), NOW()),
(92, 19, 89, NOW(), NOW()),
(93, 19, 90, NOW(), NOW()),
(94, 19, 84, NOW(), NOW()),
(95, 19, 91, NOW(), NOW()),
(96, 20, 92, NOW(), NOW()),
(97, 20, 93, NOW(), NOW()),
(98, 20, 94, NOW(), NOW()),
(99, 20, 95, NOW(), NOW()),
(100, 20, 96, NOW(), NOW()),
(101, 21, 97, NOW(), NOW()),
(102, 21, 98, NOW(), NOW()),
(103, 21, 99, NOW(), NOW()),
(104, 21, 100, NOW(), NOW()),
(105, 21, 101, NOW(), NOW()),
(106, 22, 97, NOW(), NOW()),
(107, 22, 102, NOW(), NOW()),
(108, 22, 103, NOW(), NOW()),
(109, 22, 104, NOW(), NOW()),
(110, 22, 105, NOW(), NOW()),
(111, 23, 106, NOW(), NOW()),
(112, 23, 107, NOW(), NOW()),
(113, 23, 108, NOW(), NOW()),
(114, 23, 109, NOW(), NOW()),
(115, 23, 110, NOW(), NOW()),
(117, 24, 111, NOW(), NOW()),
(118, 24, 112, NOW(), NOW()),
(119, 24, 113, NOW(), NOW()),
(120, 24, 114, NOW(), NOW()),
(121, 24, 115, NOW(), NOW()),
(122, 25, 116, NOW(), NOW()),
(123, 25, 117, NOW(), NOW()),
(124, 25, 118, NOW(), NOW()),
(125, 25, 119, NOW(), NOW()),
(126, 25, 120, NOW(), NOW()),
(127, 26, 121, NOW(), NOW()),
(128, 26, 122, NOW(), NOW()),
(129, 26, 123, NOW(), NOW()),
(130, 26, 124, NOW(), NOW()),
(131, 26, 125, NOW(), NOW()),
(132, 27, 126, NOW(), NOW()),
(133, 27, 127, NOW(), NOW()),
(134, 27, 128, NOW(), NOW()),
(135, 27, 129, NOW(), NOW()),
(136, 27, 130, NOW(), NOW()),
(137, 28, 131, NOW(), NOW()),
(138, 28, 132, NOW(), NOW()),
(139, 28, 133, NOW(), NOW()),
(140, 28, 134, NOW(), NOW()),
(141, 28, 135, NOW(), NOW()),
(142, 29, 136, NOW(), NOW()),
(143, 29, 137, NOW(), NOW()),
(144, 29, 138, NOW(), NOW()),
(145, 29, 139, NOW(), NOW()),
(146, 29, 140, NOW(), NOW());

-- --------------------------------------------------------
/* DIETAS Y ALIMENTOS */
-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `categories_of_diets`
--

INSERT INTO `categories_of_diets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dieta baja en carbohidratos', NOW(), NOW()),
(2, 'Dieta alta en proteínas', NOW(), NOW()),
(3, 'Dieta vegetariana', NOW(), NOW()),
(4, 'Dieta vegana', NOW(), NOW()),
(5, 'Dieta sin gluten', NOW(), NOW()),
(6, 'Dieta flexible', NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tags_of_ingredients`
--

INSERT INTO `tags_of_ingredients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Frutas', NOW(), NOW()),
(2, 'Verduras', NOW(), NOW()),
(3, 'Carnes', NOW(), NOW()),
(4, 'Pescados y mariscos', NOW(), NOW()),
(5, 'Huevos y productos lácteos', NOW(), NOW()),
(6, 'Cereales y productos de panadería', NOW(), NOW()),
(7, 'Legumbres', NOW(), NOW()),
(8, 'Frutos secos y semillas', NOW(), NOW()),
(9, 'Bebidas', NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id`, `title`, `description`, `user_coach_id`, `category_of_diet_id`, `created_at`, `updated_at`) VALUES
(1, 'Dieta baja en carbohidratos', 'Dieta especializada en la disminución de carbohidratos para favorecer la pérdida de peso y mejorar la composición corporal de forma saludable.', 24, 1, NOW(), NOW()),
(2, 'Dieta vegetariana', 'Dieta diseñada para personas que no consumen carne, pero sí otros productos de origen animal como lácteos o huevos.', 24, 3, NOW(), NOW()),
(3, 'Dieta flexible', 'Dieta diseñada para personas que buscan una alimentación variada y equilibrada, sin restricciones extremas.', 24, 6, NOW(), NOW()),

(4, 'Dieta alta en proteínas', 'Esta dieta se enfoca en aumentar la ingesta de proteínas para ayudar en la construcción de músculo y la recuperación después del ejercicio.', 25, 2, NOW(), NOW()),
(5, 'Dieta vegetariana', 'Dieta diseñada para personas que no consumen carne, pero sí otros productos de origen animal como lácteos o huevos.', 25, 3, NOW(), NOW()),
(6, 'Dieta vegana', 'Dieta vegana rigurosa, excluyendo todos los productos de origen animal, para promover una alimentación saludable y ética.', 25, 4, NOW(), NOW()),

(7, 'Dieta baja en carbohidratos', 'Dieta especializada en la disminución de carbohidratos para favorecer la pérdida de peso y mejorar la composición corporal de forma saludable.', 26, 1, NOW(), NOW()),
(8, 'Dieta alta en proteínas', 'Esta dieta se enfoca en aumentar la ingesta de proteínas para ayudar en la construcción de músculo y la recuperación después del ejercicio.', 26, 2, NOW(), NOW()),
(9, 'Dieta sin gluten', 'Esta dieta está diseñada para evitar el consumo de gluten y promover la salud intestinal. Incluye una variedad de alimentos frescos, sin procesar y sin gluten.', 26, 5, NOW(), NOW()),
(10, 'Dieta flexible', 'Dieta diseñada para personas que buscan una alimentación variada y equilibrada, sin restricciones extremas.', 26, 6, NOW(), NOW()),

(11, 'Dieta alta en proteínas', 'Esta dieta se enfoca en aumentar la ingesta de proteínas para ayudar en la construcción de músculo y la recuperación después del ejercicio.', 27, 2, NOW(), NOW()),
(12, 'Dieta vegana', 'Dieta vegana rigurosa, excluyendo todos los productos de origen animal, para promover una alimentación saludable y ética.', 27, 4, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `ingredients`
--
INSERT INTO `ingredients` (`id`, `name`, `tag_of_ingredient_id`, `created_at`, `updated_at`) VALUES 
(1, 'Pollo', 3, NOW(), NOW()),
(2, 'Salmón', 4, NOW(), NOW()),
(3, 'Brócoli', 2, NOW(), NOW()),
(4, 'Huevos', 5, NOW(), NOW()),
(5, 'Aguacate', 1, NOW(), NOW()),
(6, 'Nueces', 8, NOW(), NOW()),

(7, 'Espinacas', 2, NOW(), NOW()),
(8, 'Garbanzos', 7, NOW(), NOW()),
(9, 'Tofu', 7, NOW(), NOW()),
(10, 'Arroz integral', 7, NOW(), NOW()),
(11, 'Lentejas', 7, NOW(), NOW()),
(12, 'Queso feta', 5, NOW(), NOW()),

(13, 'Ternera', 3, NOW(), NOW()),
(14, 'Atún', 4, NOW(), NOW()),
(15, 'Quinoa', 8, NOW(), NOW()),
(16, 'Arroz', 7, NOW(), NOW()),
(17, 'Frijoles negros', 7, NOW(), NOW()),
(18, 'Zanahoria', 2, NOW(), NOW()),

(19, 'Queso cottage', 5, NOW(), NOW()),
(20, 'Camarones', 4, NOW(), NOW()),
(21, 'Yogur griego', 5, NOW(), NOW()),
(22, 'Carne de res magra', 3, NOW(), NOW()),
(23, 'Pavo molido', 3, NOW(), NOW()),

(24, 'Apio', 2, NOW(), NOW()),
(25, 'Guisantes', 7, NOW(), NOW()),
(26, 'Pimiento rojo', 2, NOW(), NOW()),
(27, 'Lechuga', 2, NOW(), NOW()),
(28, 'Champiñones', 2, NOW(), NOW()),

(29, 'Berenjena', 1, NOW(), NOW()),
(30, 'Cebolla', 2, NOW(), NOW()),
(31, 'Calabacín', 2, NOW(), NOW()),
(32, 'Alubias negras', 7, NOW(), NOW()),
(33, 'Leche de soja', 9, NOW(), NOW()),
(34, 'Almendras', 8, NOW(), NOW()),

(35, 'Espárragos', 2, NOW(), NOW()),
(36, 'Coliflor', 2, NOW(), NOW()),
(37, 'Queso cheddar', 5, NOW(), NOW()),
(38, 'Acelgas', 2, NOW(), NOW()),
(39, 'Tocino', 3, NOW(), NOW()),
(40, 'Ajo', 2, NOW(), NOW()),

(41, 'Pescado blanco', 4, NOW(), NOW()),
(42, 'Ternera', 3, NOW(), NOW()),
(43, 'Proteína en polvo', 8, NOW(), NOW()),
(44, 'Pavo', 3, NOW(), NOW()),
(45, 'Carne picada', 3, NOW(), NOW()),
(46, 'Clara de huevos', 5, NOW(), NOW()),

(47, 'Aceite de oliva', 8, NOW(), NOW()),
(48, 'Papa', 2, NOW(), NOW()),
(49, 'Soya', 7, NOW(), NOW()),
(50, 'Maíz', 6, NOW(), NOW()),
(51, 'Alforfón', 7, NOW(), NOW()),
(52, 'Amaranto', 8, NOW(), NOW()),

(53, 'Tomates cherry', 2, NOW(), NOW()),
(54, 'Pimiento rojo', 2, NOW(), NOW()),
(55, 'Cebolla roja', 2, NOW(), NOW()),
(56, 'Aceitunas negras', 8, NOW(), NOW()),
(57, 'Frijoles', 7, NOW(), NOW()),

(58, 'Anacardos', 8, NOW(), NOW()),
(59, 'Queso de cabra', 5, NOW(), NOW()),
(60, 'Queso fresco', 5, NOW(), NOW()),
(61, 'Chuleta de cerdo', 3, NOW(), NOW()),
(62, 'Gambas', 4, NOW(), NOW()),
(63, 'Higado de pollo', 3, NOW(), NOW()),

(64, 'Tomate', 2, NOW(), NOW()),
(65, 'Pepino', 2, NOW(), NOW()),
(66, 'Judías verdes', 7, NOW(), NOW()),
(67, 'Tofu ahumado', 7, NOW(), NOW()),
(68, 'Avena en copos', 6, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `diet_ingredients`
--

INSERT INTO `diet_ingredients` (`id`, `diet_id`, `ingredient_id`, `created_at`, `updated_at`) VALUES 
(1, 1, 1, NOW(), NOW()),
(2, 1, 2, NOW(), NOW()),
(3, 1, 3, NOW(), NOW()),
(4, 1, 4, NOW(), NOW()),
(5, 1, 5, NOW(), NOW()),
(6, 1, 6, NOW(), NOW()),

(7, 2, 7, NOW(), NOW()),
(8, 2, 8, NOW(), NOW()),
(9, 2, 9, NOW(), NOW()),
(10, 2, 10, NOW(), NOW()),
(11, 2, 11, NOW(), NOW()),
(12, 2, 12, NOW(), NOW()),

(13, 3, 13, NOW(), NOW()),
(14, 3, 14, NOW(), NOW()),
(15, 3, 15, NOW(), NOW()),
(16, 3, 16, NOW(), NOW()),
(17, 3, 17, NOW(), NOW()),
(18, 3, 18, NOW(), NOW()),

(19, 4, 14, NOW(), NOW()),
(20, 4, 19, NOW(), NOW()),
(21, 4, 20, NOW(), NOW()),
(22, 4, 21, NOW(), NOW()),
(23, 4, 22, NOW(), NOW()),
(24, 4, 23, NOW(), NOW()),

(25, 5, 24, NOW(), NOW()),
(26, 5, 25, NOW(), NOW()),
(27, 5, 26, NOW(), NOW()),
(28, 5, 27, NOW(), NOW()),
(29, 5, 28, NOW(), NOW()),
(30, 5, 5, NOW(), NOW()),

(31, 6, 29, NOW(), NOW()),
(32, 6, 30, NOW(), NOW()),
(33, 6, 31, NOW(), NOW()),
(34, 6, 32, NOW(), NOW()),
(35, 6, 33, NOW(), NOW()),
(36, 6, 34, NOW(), NOW()),

(37, 7, 35, NOW(), NOW()),
(38, 7, 36, NOW(), NOW()),
(39, 7, 37, NOW(), NOW()),
(40, 7, 38, NOW(), NOW()),
(41, 7, 39, NOW(), NOW()),
(42, 7, 40, NOW(), NOW()),

(43, 8, 41, NOW(), NOW()),
(44, 8, 42, NOW(), NOW()),
(45, 8, 43, NOW(), NOW()),
(46, 8, 44, NOW(), NOW()),
(47, 8, 45, NOW(), NOW()),
(48, 8, 46, NOW(), NOW()),

(49, 9, 47, NOW(), NOW()),
(50, 9, 48, NOW(), NOW()),
(51, 9, 49, NOW(), NOW()),
(52, 9, 50, NOW(), NOW()),
(53, 9, 51, NOW(), NOW()),
(54, 9, 52, NOW(), NOW()),

(55, 10, 53, NOW(), NOW()),
(56, 10, 54, NOW(), NOW()),
(57, 10, 55, NOW(), NOW()),
(58, 10, 56, NOW(), NOW()),
(59, 10, 57, NOW(), NOW()),
(60, 10, 7, NOW(), NOW()),

(61, 11, 58, NOW(), NOW()),
(62, 11, 59, NOW(), NOW()),
(63, 11, 60, NOW(), NOW()),
(64, 11, 61, NOW(), NOW()),
(65, 11, 62, NOW(), NOW()),
(66, 11, 63, NOW(), NOW()),

(67, 12, 64, NOW(), NOW()),
(68, 12, 65, NOW(), NOW()),
(69, 12, 66, NOW(), NOW()),
(70, 12, 67, NOW(), NOW()),
(71, 12, 68, NOW(), NOW()),
(72, 12, 36, NOW(), NOW());

/* TABLAS COMENTADAS POR SI ACASO: 

INSERT INTO `training_categories` (`id`, `training_id`, `category_of_training_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NOW(), NOW()),
(2, 2, 1, NOW(), NOW()),
(3, 3, 2, NOW(), NOW()),
(4, 4, 3, NOW(), NOW()),
(5, 5, 4, NOW(), NOW()),
(6, 6, 5, NOW(), NOW()),
(7, 7, 2, NOW(), NOW()),
(8, 8, 3, NOW(), NOW()),
(9, 9, 5, NOW(), NOW()),
(10, 10, 6, NOW(), NOW()),
(11, 11, 6, NOW(), NOW()),
(12, 12, 1, NOW(), NOW()),
(13, 13, 2, NOW(), NOW()),
(14, 14, 3, NOW(), NOW()),
(15, 15, 6, NOW(), NOW()),
(16, 16, 1, NOW(), NOW()),
(17, 17, 3, NOW(), NOW()),
(18, 18, 5, NOW(), NOW()),
(19, 19, 5, NOW(), NOW()),
(20, 20, 6, NOW(), NOW()),
(21, 21, 1, NOW(), NOW()),
(22, 22, 2, NOW(), NOW()),
(23, 23, 4, NOW(), NOW()),
(24, 24, 5, NOW(), NOW()),
(25, 25, 6, NOW(), NOW()),
(26, 26, 2, NOW(), NOW()),
(27, 27, 4, NOW(), NOW()),
(28, 28, 4, NOW(), NOW()),
(29, 29, 5, NOW(), NOW());

INSERT INTO `diets_categories` (`id`, `diet_id`, `category_of_diet_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NOW(), NOW()),
(2, 2, 3, NOW(), NOW()),
(3, 3, 6, NOW(), NOW()),
(4, 4, 2, NOW(), NOW()),
(5, 5, 3, NOW(), NOW()),
(6, 6, 4, NOW(), NOW()),
(7, 7, 1, NOW(), NOW()),
(8, 8, 2, NOW(), NOW()),
(9, 9, 5, NOW(), NOW()),
(10, 10, 6, NOW(), NOW()),
(11, 11, 2, NOW(), NOW()),
(12, 12, 4, NOW(), NOW()); */