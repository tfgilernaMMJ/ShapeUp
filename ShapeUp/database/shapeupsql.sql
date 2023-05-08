/* DROP DATABASE IF EXISTS shapeupsql;
CREATE DATABASE shapeupsql CHARACTER SET utf8mb4; */
USE shapeupsql;

--
-- Base de datos: `shapeupsql`
--

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `suscriptions`
--

INSERT INTO `suscriptions` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gratuita', 'Suscripción gratuita', 0, '2023-05-03 10:22:03', '2023-05-03 10:22:03'),
(2, 'SuperShapeUp', 'Suscripción SuperShapeUp', 9.99, '2023-05-03 10:22:03', '2023-05-03 10:22:03');

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
(27, 'Daniel Ramírez', 'danielramirez', '$2a$12$K2QPWE2SnsFdu67SZqtCcObUSuFwAEselfyPhnCrckPFDvOPab6BG', 'daniel.ramirez@coach.com', NOW(), 'Coach', 'Estados Unidos', null, null, 31, '4.jpg', 'Soy un entrenador personal especializado en el entrenamiento de alta intensidad, la pérdida de peso y la nutrición deportiva.', '7 años', 2, null, NOW(), NOW()),
(28, 'Javier Fernández', 'javierfernandez', '$2a$12$xX2KSBu2eQ3WhOYdekYmheLowKCVPJItQFkUK6Osp/pNL4MEXwpZW', 'javier.fernandez@coach.com', NOW(), 'Coach', 'España', 35, null, null, '5.jpg', 'Soy un entrenador personal certificado con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '9 años', 2, null, NOW(), NOW()),
(29, 'Marta Gutiérrez', 'martagutierrez', '$2a$12$VsWNs25ZEbneNQf1ghi4FenhZei9nmxl09SwwPuJk7L5.SWKCIJlO', 'marta.gutierrez@coach.com', NOW(), 'Coach', 'España', 29, null, null, '6.jpg', 'Soy una entrenadora personal con experiencia en el entrenamiento de fuerza y el acondicionamiento físico. Mi objetivo es ayudar a las personas a mejorar su salud.', '5 años', 2, null, NOW(), NOW());

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
-- Volcado de datos para la tabla `categories_of_trainings`
--

INSERT INTO `categories_of_trainings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento de fuerza', NOW(), NOW()),
(2, 'Entrenamiento de aumento de masa muscular', NOW(), NOW()),
(3, 'Entrenamiento de perdida de peso', NOW(), NOW()),
(4, 'Entrenamiento de flexibilidad', NOW(), NOW()),
(5, 'Entrenamiento de equilibrio y coordinación', NOW(), NOW()),
(6, 'Entrenamiento de velocidad y agilidad', NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `coaches`
--

/*
INSERT INTO `coaches` (`id`, `name`, `username`, `password`, `email`, `email_verified_at`, `country`, `age`, `photo`, `biography`, `experience`, `remember_token`, `created_at`, `updated_at`) VALUES 
(1, 'Laura Rodríguez', 'laurarodriguez', '$2a$12$.dFH6gODDAgIK2BZkcEy8uSECQE8jaYo6CNpazYXKG0LL5e8xiXNy', 'laura.rodriguez@coach.com', NULL, 'España', 32, '1.jpg', 'Soy una entrenadora personal con un enfoque en el entrenamiento de fuerza, la nutrición deportiva y su bienestar.', '6 años', NULL, NOW(), NOW()),
(2, 'Pedro Martínez', 'pedromartinez', '$2a$12$kY1SOu8Ef7i9YADA4t2JMO0j.ysik9yF0qhrq3JEs6t/KrMrgonm6', 'pedro.martinez@coach.com', NULL, 'México', 39, '2.jpg', 'Soy un entrenador personal certificado con más de 10 años de experiencia en el entrenamiento de fuerza y el acondicionamiento físico.', '10 años', NULL, NOW(), NOW()),
(3, 'Marcela Díaz', 'marceladiaz', '$2a$12$DmtoVViMYZQHD0yY3Avb9u3OgsOZ6JdM7/RnxkpsT.U7vtt6FRsaC', 'marcela.diaz@coach.com', NULL, 'México', 27, '3.jpg', 'Soy una entrenadora personal certificada con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '4 años', NULL, NOW(), NOW()),
(4, 'Daniel Ramírez', 'danielramirez', '$2a$12$K2QPWE2SnsFdu67SZqtCcObUSuFwAEselfyPhnCrckPFDvOPab6BG', 'daniel.ramirez@coach.com', NULL, 'Estados Unidos', 31, '4.jpg', 'Soy un entrenador personal especializado en el entrenamiento de alta intensidad, la pérdida de peso y la nutrición deportiva.', '7 años', NULL, NOW(), NOW()),
(5, 'Javier Fernández', 'javierfernandez', '$2a$12$xX2KSBu2eQ3WhOYdekYmheLowKCVPJItQFkUK6Osp/pNL4MEXwpZW', 'javier.fernandez@coach.com', NULL, 'España', 35, '5.jpg', 'Soy un entrenador personal certificado con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '9 años', NULL, NOW(), NOW()),
(6, 'Marta Gutiérrez', 'martagutierrez', '$2a$12$VsWNs25ZEbneNQf1ghi4FenhZei9nmxl09SwwPuJk7L5.SWKCIJlO', 'marta.gutierrez@coach.com', NULL, 'España', 29, '6.jpg', 'Soy una entrenadora personal con experiencia en el entrenamiento de fuerza y el acondicionamiento físico. Mi objetivo es ayudar a las personas a mejorar su salud.', '5 años', NULL, NOW(), NOW()); */

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `diets`
--

/* INSERT INTO `diets` (`id`, `title`, `description`, `tips`, `not_eat`, `user_coach_id`, `created_at`, `updated_at`) VALUES
(1, 'Dieta Mediterránea', 'La dieta mediterránea es una forma de comer basada en los patrones alimentarios tradicionales de los países mediterráneos. Incluye una variedad de alimentos como frutas, verduras, cereales integrales, legumbres, pescado, frutos secos y aceite de oliva. Además, limita la ingesta de carne roja, dulces y alimentos procesados. Esta dieta ha demostrado tener beneficios para la salud cardiovascular, la pérdida de peso y la prevención de enfermedades crónicas.', 'Mantén una dieta equilibrada, bebe suficiente agua, haz ejercicio regularmente y evita el consumo de tabaco y alcohol.', 'Se recomienda evitar los alimentos procesados y refinados, las carnes rojas y los productos lácteos altos en grasa.', 1, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(2, 'Dieta cetogénica', 'La dieta cetogénica es una dieta baja en carbohidratos y alta en grasas que se utiliza para perder peso y mejorar la salud metabólica. Al seguir esta dieta, el cuerpo entra en un estado llamado cetosis, en el cual quema grasa en lugar de carbohidratos para obtener energía. Esta dieta se basa en la ingesta de alimentos ricos en grasas saludables, como aceite de oliva, aguacate, nueces y semillas, junto con proteínas y una cantidad limitada de carbohidratos.', 'Haz un seguimiento de tu ingesta de carbohidratos, asegúrate de obtener suficientes proteínas y grasas saludables y bebe mucha agua.', 'Se deben evitar los alimentos ricos en carbohidratos, como los azúcares, los granos y las frutas con alto contenido de azúcar. También se recomienda limitar el consumo de alcohol y alimentos procesados.', 2, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(3, 'Dieta vegetariana', 'La dieta vegetariana se basa en la exclusión de carne y pescado de la alimentación. Se pueden incluir otros alimentos de origen animal como huevos, leche y queso. Una dieta vegetariana bien equilibrada puede proporcionar todos los nutrientes necesarios para una buena salud, incluyendo proteínas, hierro y calcio. Además, puede ayudar a prevenir enfermedades crónicas como la diabetes y las enfermedades del corazón.', 'Asegúrate de obtener suficientes proteínas de fuentes vegetales, como legumbres, nueces y tofu. Considera tomar suplementos de vitamina B12 y hierro.', 'En una dieta vegetariana se debe evitar cualquier tipo de carne, incluyendo carnes rojas, pollo, pescado y mariscos. También se debe limitar el consumo de productos lácteos y huevos.', 3, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(4, 'Dieta sin gluten', 'La dieta sin gluten se basa en evitar alimentos que contienen gluten, una proteína que se encuentra en el trigo, la cebada y el centeno. Esta dieta se utiliza principalmente para tratar la enfermedad celíaca y la sensibilidad al gluten no celíaca. Se pueden incluir alimentos como frutas, verduras, carne, pescado, huevos y legumbres, así como alimentos sin gluten como arroz, quinoa y maíz.', ' Se deben evitar todos los alimentos que contengan gluten, como el trigo, la cebada, el centeno y la avena. Esto incluye productos de panadería, pastas, cereales y productos procesados que contengan gluten.', 'Lee las etiquetas de los alimentos para evitar ingredientes con gluten. Considera trabajar con un dietista para asegurarte de obtener suficientes nutrientes.', 4, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(5, 'Dieta baja en grasas', 'La dieta baja en grasas se basa en limitar la ingesta de grasas, especialmente grasas saturadas y grasas trans. Esta dieta se ha utilizado para ayudar a perder peso y reducir el riesgo de enfermedades crónicas como la enfermedad cardíaca.', '1. Lee las etiquetas de los alimentos para asegurarte de que sean bajos en grasas. 2. Elige alimentos bajos en grasas saturadas y grasas trans. 3. Cocina los alimentos de manera saludable, como al horno o a la parrilla en lugar de freírlos.', ' se deben evitar todos los alimentos que contengan gluten, como el trigo, la cebada, el centeno y la avena. Esto incluye productos de panadería, pastas, cereales y productos procesados que contengan gluten.', 2, '2023-04-17 18:10:48', '2023-04-17 18:10:48');
*/
-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `diets_categories`
--

INSERT INTO `diets_categories` (`id`, `diet_id`, `category_of_diet_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(2, 1, 9, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(3, 2, 1, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(4, 2, 17, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(5, 3, 4, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(6, 4, 5, '2023-04-17 19:21:07', '2023-04-17 19:21:07'),
(7, 5, 9, '2023-04-17 19:21:07', '2023-04-17 19:21:07');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Altair Sport', '1.jpg', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(2, 'GO Fit', '2.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(3, 'Inacua', '3.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(4, 'MC Fit', '4.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(5, 'Metropilian', '5.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(6, 'O2 Centro Wellness', '6.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44'),
(7, 'Sato Spòrt', '7.png', '2023-05-03 10:21:44', '2023-05-03 10:21:44');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `supermarkets`
--

INSERT INTO `supermarkets` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Aldi', '1.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(2, 'Carrefour', '2.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(3, 'Corte Inglés', '3.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(4, 'Coviran', '4.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(5, 'Dia', '5.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(6, 'Lidl', '6.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(7, 'Mas', '7.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(8, 'Mercadona', '8.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59'),
(9, 'Supersol', '9.png', '2023-05-03 10:21:59', '2023-05-03 10:21:59');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tags_of_exercises`
--

INSERT INTO `tags_of_exercises` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pecho', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(2, 'Espalda', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(3, 'Piernas', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(4, 'Brazos', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(5, 'Hombros', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(6, 'Abdominales', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(7, 'Glúteos', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(8, 'Cardio', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(9, 'Fuerza', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(10, 'Equilibrio', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(11, 'Estiramientos', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(12, 'Flexibilidad', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(13, 'Pliometría', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(14, 'Agilidad', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(15, 'Coordination', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(16, 'Movilidad', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(17, 'Peso corporal', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(18, 'Resistencia', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(19, 'Velocidad', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(20, 'Potencia', '2023-04-17 18:10:44', '2023-04-17 18:10:44');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `description`, `proposal`, `duration`, `repetitions`, `series`, `explanatory_video`, `tag_of_exercise_id`, `user_coach_id`, `created_at`, `updated_at`) VALUES
(1, 'Sentadillas con barra', 'Este es un ejercicio compuesto que trabaja los músculos de las piernas, glúteos y core. Coloca la barra sobre tus hombros y desciende lentamente hasta que tus muslos estén paralelos al suelo, luego levántate lentamente.', 'Mejorar la fuerza y la resistencia de las piernas y el core.', 45, 10, 4, 'https://www.youtube.com/watch?v=3fvw0FIGYF4', 3, 24, NOW(), NOW()),
(2, 'Prensa de piernas', ' Este ejercicio compuesto trabaja los músculos de las piernas y los glúteos. Siéntate en la prensa de piernas y empuja la plataforma hacia afuera, luego baja lentamente.', 'Mejorar la fuerza y la resistencia de las piernas y los glúteos.', 60, 10, 4, 'https://www.youtube.com/watch?v=S6nnM60yjqk', 3, 24, NOW(), NOW()),
(3, 'Press de banca', 'Este ejercicio compuesto trabaja los músculos del pecho, hombros y tríceps. Acuéstate en un banco y levanta la barra desde el soporte, bájala lentamente hasta tocar tu pecho y luego levántala.', 'Mejorar la fuerza y la resistencia del pecho, hombros y tríceps.', 45, 10, 4, 'https://www.youtube.com/watch?v=JhcjQHkjklA', 1, 24, NOW(), NOW()),
(4, 'Remo con barra', 'Un ejercicio que trabaja los músculos de la espalda, hombros y bíceps.', 'Fortalecer espalda, hombros y bíceps', 30	, 10, 4, 'https://www.youtube.com/watch?v=3uiWjik2yEQ', 2, 24, NOW(), NOW()),
(5, 'Levantamiento de peso muerto', 'Un ejercicio compuesto que trabaja los músculos de la espalda, piernas y glúteos.', 'Fortalecer espalda, piernas y glúteos.', 45, 10, 4, 'https://www.youtube.com/watch?v=7KL8SgCP4KQ', 3, 24, NOW(), NOW()),
(6, 'Press militar', 'Un ejercicio compuesto que trabaja los músculos de los hombros y tríceps.', 'Fortalecer hombros y tríceps', 45, 10, 4, 'https://www.youtube.com/watch?v=o5M9RZ-vWrc', 5, 24, NOW(), NOW()),
(7, 'Dominadas', 'Un ejercicio que trabaja los músculos de la espalda, hombros y bíceps', 'Fortalecer espalda, hombros y bíceps', 45, 10, 4, 'https://www.youtube.com/watch?v=94LjCdfkQ-0', 2, 24, NOW(), NOW()),
(8, 'Zancadas con mancuernas', 'Un ejercicio que trabaja los músculos de las piernas y glúteos.', 'Fortalecer piernas y glúteos', 45, 10, 4, 'https://www.youtube.com/watch?v=Uw56z6JdWGY', 3, 24, NOW(), NOW()),
(9, 'Curl de bíceps con mancuernas', 'Un ejercicio que trabaja los músculos de los bíceps.', 'Fortalecer los bíceps', 30, 10, 4, 'https://www.youtube.com/watch?v=uICWtGLd4-I', 4, 24, NOW(), NOW()),
(10, 'Extensión de tríceps con mancuernas', 'Un ejercicio que trabaja los músculos de los tríceps.', 'Fortalecer los tríceps', 30, 10, 4, 'https://www.youtube.com/watch?v=-paLAzl68WU', 4, 24, NOW(), NOW()),
(11, 'Press de banca con mancuernas', 'Un ejercicio que trabaja los músculos del pecho, hombros y tríceps.', 'Aumentar la masa muscular del pecho', 30, 12, 4, 'https://www.youtube.com/watch?v=jrDDz7x1Dpo', 1, 24, NOW(), NOW()),
(12, 'Remo con mancuernas', 'Un ejercicio que trabaja los músculos de la espalda y bíceps.', 'Aumentar la masa muscular de la espalda', 30, 12, 4, 'https://www.youtube.com/watch?v=EiGN5ohOYOc', 2, 24, NOW(), NOW()),
(13, 'Press de hombros con mancuernas', 'Un ejercicio que trabaja los músculos de los hombros.', 'Aumentar la masa muscular de los hombros', 30, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 5, 24, NOW(), NOW()),
(14, 'Saltos de tijera', 'Este ejercicio implica saltar y alternar las piernas mientras se mantiene una postura en cuclillas.', 'Mejora la fuerza y resistencia muscular, quema calorías y ayuda a mejorar la coordinación.', 120, 30, 4, 'https://www.youtube.com/watch?v=iO8srE_cz3s', 15, 24, NOW(), NOW()),
(15, 'Burpees', 'Este ejercicio combina una sentadilla, una plancha y un salto para trabajar todo el cuerpo.', 'Mejora la fuerza y resistencia muscular, quema calorías y ayuda a mejorar la coordinación', 120, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 3, 24, NOW(), NOW()),
(16, 'Caminadora inclinada', 'Este ejercicio implica caminar en una caminadora con una inclinación del 10% o más para aumentar la intensidad', 'Mejora la capacidad cardiovascular y ayuda a quemar calorías', 1200, 1, 1, 'https://www.youtube.com/watch?v=jNIKxC69HGc', 8, 24, NOW(), NOW()),
(17, 'Entrenamiento de intervalos de alta intensidad (HIIT)', 'Este tipo de entrenamiento implica realizar ejercicios de alta intensidad durante cortos períodos de tiempo, seguidos de períodos de descanso o ejercicios de baja intensidad', 'Mejora la capacidad cardiovascular, aumenta la quema de calorías y ayuda a reducir la grasa corporal', 1200, 1, 4, 'https://www.youtube.com/watch?v=P1HyMCX8NJs', 8, 24, NOW(), NOW()),
(18, 'Sentadillas con salto', 'Este ejercicio implica realizar una sentadilla y saltar hacia arriba desde la posición de cuclillas', 'Mejora la fuerza y resistencia muscular, quema calorías y ayuda a mejorar la coordinación', 1200, 30, 3, 'https://www.youtube.com/watch?v=P1HyMCX8NJs', 8, 24, NOW(), NOW()),
(19, 'Estiramientos de piernas', 'Estiramientos para mejorar la flexibilidad en las piernas', 'Mejora la flexibilidad de tus piernas', 600, 30, 3, 'https://www.youtube.com/watch?v=fHvJvnGxH3U', 12, 24, NOW(), NOW()),
(20, 'Estiramiento de espalda', 'Estiramiento para mejorar la flexibilidad en la espalda', 'Mejora la flexibilidad de tu espalda', 300, 30, 3, 'https://www.youtube.com/watch?v=w2MJJ4gj644', 12, 24, NOW(), NOW()),
(21, 'Estiramiento de cuello', 'Estiramientos para mejorar la flexibilidad en el cuello', 'Mejora la flexibilidad de tu cuello', 300, 30, 3, 'https://www.youtube.com/watch?v=stQ4yI44Law', 12, 24, NOW(), NOW()),
(22, 'Estiramiento de hombros', 'Estiramiento para mejorar la flexibilidad en los hombros', 'Mejora la flexibilidad de tus hombros', 300, 30, 3, 'https://www.youtube.com/watch?v=OLtUiP0XC4Q', 12, 24, NOW(), NOW()),
(23, 'Estiramientos de brazos', 'Estiramientos para mejorar la flexibilidad en los brazos', 'Mejora la flexibilidad de tus brazos', 600, 30, 3, 'https://www.youtube.com/watch?v=4W-xie4ZOfs&t=318s', 12, 24, NOW(), NOW()),
(24, 'Paso de bailarina', 'Este ejercicio de equilibrio se realiza en un solo pie. Levante una pierna y coloque la parte inferior de su pie en la rodilla de la otra pierna. Lentamente, levante su pierna en el aire detrás de usted mientras mantiene el equilibrio sobre la pierna que sostiene todo su peso. Manténgase durante 30 segundos y luego cambie de pierna', 'Este ejercicio ayuda a mejorar la estabilidad y el equilibrio', 30, 1, 3, 'https://www.youtube.com/watch?v=r5FzpRvQkk0', 15, 24, NOW(), NOW()),
(25, 'Caminata en el cable', 'Para este ejercicio, necesitará una banda elástica o una cuerda de escalada y dos postes o anclajes para sostener la cuerda. Ate la cuerda a una altura adecuada y camine sobre ella mientras mantiene el equilibrio.', 'Este ejercicio ayuda a mejorar la coordinación y la estabilidad del núcleo', 60, 10, 3, 'https://www.youtube.com/watch?v=zTFG6gScuD0', 10, 24, NOW(), NOW()),
(26, 'Bosu Ball Squat', 'Coloque el Bosu Ball en el suelo con el lado redondeado hacia arriba. Párese con ambos pies en la pelota y baje en una sentadilla mientras mantiene el equilibrio. Mantenga la posición durante 10 segundos y luego levántese lentamente.', 'Este ejercicio ayuda a mejorar la estabilidad y la coordinación del núcleo', 45, 12, 3, 'https://www.youtube.com/watch?v=2eyUkrPt9R0', 10, 24, NOW(), NOW()),
(27, 'Paso lateral con cono', 'Coloque un cono en el suelo y párese al lado del cono. Levante la pierna opuesta al cono y cruce su cuerpo para tocar el cono con su pie. Vuelva a su posición inicial y repita con la otra pierna.', 'Este ejercicio ayuda a mejorar la coordinación y el equilibrio lateral', 30, 10, 3, 'https://www.youtube.com/watch?v=3yEbnTC890Q', 15, 24, NOW(), NOW()),
(28, 'Sentadilla en una pierna', 'Este ejercicio ayuda a mejorar el equilibrio y la coordinación de las piernas y la pelvis', 'Este ejercicio ayuda a mejorar el equilibrio y la coordinación de las piernas y la pelvis', 30, 10, 3, 'https://www.youtube.com/watch?v=ILO0S9wPNwI', 10, 24, NOW(), NOW()),

(29, 'Sentadillas con barra', 'De pie con los pies separados al ancho de los hombros, sosteniendo una barra con pesas en la parte posterior de los hombros, baja tu cuerpo doblando las rodillas y las caderas hasta que tus muslos estén paralelos al suelo. Luego, vuelve a la posición inicial.', 'Las sentadillas son un ejercicio compuesto que trabaja los cuádriceps, los glúteos, los isquiotibiales, la espalda baja y el núcleo.', 15, 10, 4, 'https://www.youtube.com/watch?v=ILO0S9wPNwI', 3, 25, NOW(), NOW()),
(30, 'Press de banca', 'Acuéstate en un banco plano con los pies en el suelo y agarra una barra con pesas con las manos separadas al ancho de los hombros. Luego, baja la barra hasta que toque tu pecho y luego empújala hacia arriba hasta que los brazos estén completamente extendidos.', 'El press de banca trabaja los músculos del pecho, los hombros y los tríceps.', 30, 12, 4, 'https://www.youtube.com/watch?v=dWV4uWd2GvM', 1, 25, NOW(), NOW()),
(31, 'Peso muerto', 'De pie con los pies separados al ancho de los hombros, agarrando una barra con pesas con las manos separadas al ancho de los hombros, baja tu cuerpo doblando las rodillas y las caderas hasta que puedas agarrar la barra. Luego, levanta la barra hasta que estés de pie con los brazos extendidos.', 'El press de banca trabaja los músculos del pecho, los hombros y los tríceps.', 20, 10, 4, 'https://www.youtube.com/watch?v=Y1Feac6SHPI', 3, 25, NOW(), NOW()),
(32, 'Elevación de pantorrillas', 'La elevación de pantorrillas es un ejercicio que se enfoca en fortalecer las pantorrillas, el músculo gastrocnemio y el sóleo', 'Fortalece las pantorrillas.', 30, 15, 4, 'https://www.youtube.com/watch?v=iS1VtOd2bGQ', 3, 25, NOW(), NOW()),
(33, 'Curl de bíceps con mancuernas', 'El curl de bíceps con mancuernas es un ejercicio de levantamiento de pesas que fortalece los músculos de los brazos, especialmente los bíceps.', 'Fortalece los músculos de los brazos', 45, 12, 4, 'https://www.youtube.com/watch?v=qERAhN-qpaU', 4, 25, NOW(), NOW()),
(34, 'Sentadillas con salto', 'Las sentadillas con salto son un ejercicio de alto impacto que ayuda a aumentar la frecuencia cardíaca y quemar calorías. Comience con los pies separados a la anchura de los hombros, haga una sentadilla profunda y luego salte lo más alto que pueda.', 'Las sentadillas con salto queman calorías y aumentan la frecuencia cardíaca.', 30, 12, 4, 'https://www.youtube.com/watch?v=IiHH0EWo8-k', 3, 25, NOW(), NOW()),
(35, 'Zancadas con salto', 'Las zancadas con salto son un ejercicio cardiovascular y de fuerza que ayuda a quemar calorías y mejorar la resistencia. Comience de pie con los pies juntos, de un gran paso hacia adelante con el pie derecho y luego salte lo más alto que pueda antes de cambiar de pierna y repetir.', 'Las zancadas con salto queman calorías y mejoran la resistencia.', 30, 12, 4, 'https://www.youtube.com/watch?v=Gd4H2uKDHIg', 8, 25, NOW(), NOW()),
(36, 'Burpees', 'Los burpees son un ejercicio cardiovascular de cuerpo completo que ayuda a aumentar la frecuencia cardíaca y quemar calorías. Comience de pie, agáchese y coloque las manos en el suelo, haga un salto hacia atrás para quedar en posición de plancha, haga un push-up, salte hacia adelante, y finalmente salte lo más alto que pueda', 'Los burpees queman calorías y aumentan la frecuencia cardíaca.', 30, 12, 4, 'https://www.youtube.com/watch?v=GELRUlUSxeI', 3, 25, NOW(), NOW()),
(37, 'Mountain climbers', 'Fortalece y tonifica el cuerpo entero, mejorando la resistencia y el sistema cardiovascular.', 'Mountain climbers queman muchas calorías, fortalecen y tonifican el cuerpo entero, mejoran la resistencia y el sistema cardiovascular. Este ejercicio es especialmente bueno para los músculos de las piernas, glúteos, abdominales y brazos.', 60, 30, 3, 'https://www.youtube.com/watch?v=1bSqG-4bIg4', 8, 25, NOW(), NOW()),
(38, 'Saltos de tijera', 'Un ejercicio cardiovascular que trabaja todo el cuerpo, mejorando la resistencia y la coordinación.', 'Saltos de tijera son un ejercicio cardiovascular que trabaja todo el cuerpo, mejorando la resistencia y la coordinación. Este ejercicio es especialmente bueno para los músculos de las piernas, glúteos, abdominales y brazos.', 60, 20, 3, 'https://www.youtube.com/watch?v=V6UJW6wqV6g', 8, 25, NOW(), NOW()),
(39, 'Caminar sobre una línea', 'Coloca una cuerda o una línea en el suelo y camina sobre ella con los pies juntos, tratando de mantener el equilibrio. Si es demasiado fácil, puedes intentar caminar hacia adelante y hacia atrás o incluso caminar hacia adelante y hacia atrás mientras giras el cuerpo. Realiza este ejercicio durante 3 series de 30 segundos cada una.', 'Este ejercicio ayuda a mejorar el equilibrio y la coordinación.', 30, 1, 3, 'https://www.youtube.com/watch?v=sK6FqLSVb2A', 8, 25, NOW(), NOW()),
(40, 'Equilibrio sobre una pierna', 'Este ejercicio ayuda a mejorar la estabilidad y el equilibrio del cuerpo al pararse sobre una pierna durante un tiempo prolongado', 'El equilibrio sobre una pierna es un ejercicio que ayuda a mejorar la estabilidad y la coordinación del cuerpo.', 60, 1, 3, 'https://www.youtube.com/watch?v=_3Z2lc_Om7k', 10, 25, NOW(), NOW()),
(41, 'Saltos laterales con cono', 'Este ejercicio mejora la coordinación y el equilibrio mientras se salta hacia los lados sobre un cono', 'Los saltos laterales con cono son un ejercicio efectivo para mejorar la coordinación y el equilibrio', 30, 20, 3, 'https://www.youtube.com/watch?v=1mStIPjEYqA', 10, 25, NOW(), NOW()),
(42, 'Caminar en el lugar con ojos cerrados', 'Este ejercicio mejora el equilibrio y la coordinación al caminar en el lugar con los ojos cerrados', 'Caminar en el lugar con ojos cerrados es un ejercicio simple pero efectivo para mejorar el equilibrio y la coordinación', 60, 1, 3, 'https://www.youtube.com/watch?v=RkRbx5e3Kc0', 10, 25, NOW(), NOW()),
(43, 'Malabarismo con pelota', 'Este ejercicio mejora la coordinación y el equilibrio al hacer malabarismos con una pelota', 'El malabarismo con pelota es un ejercicio divertido y efectivo para mejorar la coordinación y el equilibrio', 60, 1, 3, 'https://www.youtube.com/watch?v=6pmz5PYEsBE', 10, 25, NOW(), NOW()),
(44, 'Sprint', 'Correr a máxima velocidad durante una corta distancia.', 'Mejora la velocidad y potencia muscular.', 15, 5, 5, 'https://www.youtube.com/watch?v=4u8c24sGGg8', 19, 25, NOW(), NOW()),
(45, 'Salto de caja', 'Saltar desde una caja o banco y aterrizar suavemente en el suelo.', 'Mejora la potencia de las piernas, la coordinación y el equilibrio.', 30, 10, 3, 'https://www.youtube.com/watch?v=Y7oZdwP-mcY', 14, 25, NOW(), NOW()),
(46, 'Escalera de agilidad', 'Pasar a través de una serie de conos o escalones en un patrón específico y lo más rápido posible.', 'Mejora la agilidad, la coordinación y el equilibrio.', 45, 3, 5, 'https://www.youtube.com/watch?v=AxopJJ-_hzY', 14, 25, NOW(), NOW()),
(47, 'Plyo push-ups', 'Realizar una flexión de pecho y empujar para despegar las manos del suelo y aterrizar suavemente.', 'Mejora la potencia del tren superior y la coordinación.', 20, 5, 4, 'https://www.youtube.com/watch?v=QlsBDcMK9EY', 14, 25, NOW(), NOW()),
(48, 'Salto de vallas', 'Salta sobre una serie de vallas colocadas en el suelo.', 'Los saltos de vallas ayudan a mejorar la velocidad y la coordinación.', 30, 10, 3, 'https://www.youtube.com/watch?v=z6PaNxw0bE8', 14, 25, NOW(), NOW()),
(49, 'Correr zigzag', 'Corre hacia adelante y hacia atrás a través de un conjunto de conos colocados en un patrón zigzag.', 'El correr zigzag ayuda a mejorar la velocidad y la agilidad.', 60, 10, 3, 'https://www.youtube.com/watch?v=cJ6KtDK1fYI', 19, 25, NOW(), NOW()),
(50, 'Saltos laterales', 'Salta de un lado a otro sobre una línea imaginaria en el suelo.', 'Los saltos laterales ayudan a mejorar la velocidad y la agilidad lateral.', 30, 10, 3, 'https://www.youtube.com/shorts/a2kwZCrrz2c', 14, 25, NOW(), NOW()),
(51, 'Sprints hacia atrás', 'Corre hacia atrás tan rápido como puedas durante una cierta distancia.', 'Los sprints hacia atrás ayudan a mejorar la velocidad y la agilidad.', 30, 10, 3, 'https://www.youtube.com/shorts/l0M2C_tWW7E', 19, 25, NOW(), NOW()),
(52, 'Saltos en cuclillas', 'Salta hacia arriba desde una posición de cuclillas.', 'Los saltos en cuclillas ayudan a mejorar la velocidad y la fuerza de las piernas.', 30, 10, 3, 'https://www.youtube.com/watch?v=rp_ZKQ1FZvM', 14, 25, NOW(), NOW());

--
-- Volcado de datos para la tabla `tags_of_ingredients`
--

INSERT INTO `tags_of_ingredients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Proteína', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(2, 'Carbohidratos complejos', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(3, 'Grasas saludables', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(4, 'Vegetales verdes', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(5, 'Frutas frescas', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(6, 'Frutos secos y semillas', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(7, 'Pescado y marisco', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(8, 'Carne magra', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(9, 'Huevos', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(10, 'Legumbres', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(11, 'Cereales integrales', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(12, 'Productos lácteos bajos en grasa', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(13, 'Superalimentos', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(14, 'Alimentos orgánicos', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(15, 'Sin gluten', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(16, 'Bajo en sodio', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(17, 'Bajo en grasas saturadas', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(18, 'Vegano', '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(19, 'Alimentos bajos en calorías', '2023-04-17 18:10:45', '2023-04-17 18:10:45');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `ingredients`
--
/*
INSERT INTO `ingredients` (`id`, `name`, `tag_of_ingredient_id`, `created_at`, `updated_at`) VALUES
(1, 'ingredient_1', 6, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(2, 'ingredient_2', 10, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(3, 'ingredient_3', 3, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(4, 'ingredient_4', 19, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(5, 'ingredient_5', 7, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(6, 'ingredient_6', 1, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(7, 'ingredient_7', 18, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(8, 'ingredient_8', 14, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(9, 'ingredient_9', 5, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(10, 'ingredient_10', 13, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(11, 'ingredient_11', 9, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(12, 'ingredient_12', 4, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(13, 'ingredient_13', 11, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(14, 'ingredient_14', 16, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(15, 'ingredient_15', 2, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(16, 'ingredient_16', 8, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(17, 'ingredient_17', 15, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(18, 'ingredient_18', 12, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(19, 'ingredient_19', 19, '2023-04-17 19:26:16', '2023-04-17 19:26:16'),
(20, 'ingredient_20', 17, '2023-04-17 19:26:16', '2023-04-17 19:26:16'); */

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `description`, `duration`, `level`, `user_coach_id`, `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad', 60, 'High', 24, NOW(), NOW()),
(2, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad', 45, 'Medium', 24, NOW(), NOW()),
(3, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen', 60, 'High', 24, NOW(), NOW()),
(4, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes', 45, 'Low', 24, NOW(), NOW()),
(5, 'Entrenamiento de flexibilidad', 'Mejora tu flexibilidad y amplitud de movimiento con este entrenamiento enfocado en estiramientos estáticos y dinámicos', 45, 'Medium', 24, NOW(), NOW()),	
(6, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento que incluye ejercicios específicos para aumentar la estabilidad y la capacidad de reacción', 50, 'High', 24, NOW(), NOW()),
(7, 'Entrenamiento de aumento de masa muscular', 'Aumento tus músculos con este entrenamiento para personas que les cuesta subir volumen', 45, 'Low', 25, NOW(), NOW()),
(8, 'Entrenamiento de pérdida de peso', 'Baja tu masa corporal y quema calorías con este entrenamiento para persona principiantes', 60, 'Medium', 25, NOW(), NOW()),
(9, 'Entrenamiento de equilibrio y coordinación', 'Mejora tu equilibrio y coordinación con este entrenamiento que incluye ejercicios específicos para aumentar la estabilidad y la capacidad de reacción', 60, 'Medium', 25, NOW(), NOW()),
(10, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad', 45, 'High', 25, NOW(), NOW()),
(11, 'Entrenamiento de velocidad y agilidad', 'Mejora tu velocidad y agilidad con este entrenamiento para aumentar tu velocidad y agilidad', 60, 'Low', 25, NOW(), NOW());



-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `training_categories`
--

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
(11, 11, 6, NOW(), NOW());



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
(55, 11, 52, NOW(), NOW());

-- --------------------------------------------------------