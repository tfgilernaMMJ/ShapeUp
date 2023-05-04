/* DROP DATABASE IF EXISTS shapeupsql;
CREATE DATABASE shapeupsql CHARACTER SET utf8mb4; */
USE shapeupsql;

--
-- Base de datos: `shapeupsql`
--

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `categories_of_diets`
--

INSERT INTO `categories_of_diets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dieta baja en carbohidratos', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(2, 'Dieta alta en proteínas', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(3, 'Dieta vegetariana', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(4, 'Dieta vegana', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(5, 'Dieta sin gluten', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(6, 'Dieta cetogénica', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(7, 'Dieta paleo', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(8, 'Dieta mediterránea', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(9, 'Dieta baja en grasas', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(10, 'Dieta rica en fibra', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(11, 'Dieta para diabetes', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(12, 'Dieta para hipertensión', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(13, 'Dieta para la menopausia', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(14, 'Dieta para la lactancia', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(15, 'Dieta para la hipertrofia muscular', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(16, 'Dieta para la definición muscular', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(17, 'Dieta para la pérdida de peso', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(18, 'Dieta para el aumento de peso', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(19, 'Dieta para la mejora del rendimiento deportivo', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(20, 'Dieta para la recuperación muscular', '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(21, 'Dieta para la reducción del estrés', '2023-04-17 18:10:44', '2023-04-17 18:10:44');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `categories_of_trainings`
--

INSERT INTO `categories_of_trainings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento cardiovascular', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(2, 'Levantamiento de pesas', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(3, 'Entrenamiento funcional', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(4, 'Yoga', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(5, 'Pilates', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(6, 'Entrenamiento de alta intensidad (HIIT)', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(7, 'Boxeo', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(8, 'Entrenamiento en circuito', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(9, 'Entrenamiento de resistencia', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(10, 'Entrenamiento de velocidad y agilidad', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(11, 'Entrenamiento de equilibrio y estabilidad', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(12, 'Entrenamiento de flexibilidad', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(13, 'Entrenamiento de natación', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(14, 'Entrenamiento en barra fija', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(15, 'Entrenamiento en anillas', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(16, 'Entrenamiento en paralelas', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(17, 'Entrenamiento en barras paralelas', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(18, 'Entrenamiento en trampolín', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(19, 'Entrenamiento de artes marciales', '2023-04-17 18:10:43', '2023-04-17 18:10:43'),
(20, 'Entrenamiento en escalada', '2023-04-17 18:10:43', '2023-04-17 18:10:43');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `categories_trainings_diets`
--

INSERT INTO `categories_trainings_diets` (`id`, `category_of_training_id`, `category_of_diet_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(2, 1, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(3, 1, 8, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(4, 1, 9, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(5, 1, 17, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(6, 1, 17, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(7, 2, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(8, 2, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(9, 2, 10, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(10, 2, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(11, 2, 19, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(12, 2, 20, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(13, 3, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(14, 3, 10, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(15, 3, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(16, 3, 19, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(17, 3, 17, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(18, 4, 19, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(19, 4, 9, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(20, 4, 10, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(21, 4, 21, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(22, 5, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(23, 6, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(24, 7, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(25, 7, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(26, 8, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(27, 8, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(28, 9, 17, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(29, 10, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(30, 11, 9, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(31, 11, 10, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(32, 12, 8, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(33, 13, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(34, 14, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(35, 14, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(36, 15, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(37, 16, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(38, 17, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(39, 18, 15, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(40, 19, 17, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(41, 20, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(42, 20, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(43, 1, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(44, 2, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(45, 3, 3, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(46, 4, 4, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(47, 4, 4, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(48, 6, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(49, 7, 3, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(50, 8, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(51, 9, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(52, 10, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(53, 12, 1, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(54, 13, 2, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(55, 6, 3, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(56, 8, 11, '2023-04-17 18:10:44', '2023-04-17 18:10:44'),
(57, 4, 21, '2023-04-17 18:10:45', '2023-04-17 18:10:45'),
(58, 4, 21, '2023-04-17 18:10:45', '2023-04-17 18:10:45');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `username`, `password`, `email`, `email_verified_at`, `country`, `age`, `photo`, `biography`, `experience`, `remember_token`, `created_at`, `updated_at`) VALUES 
(1, 'Laura Rodríguez', 'laurarodriguez', '$2a$12$.dFH6gODDAgIK2BZkcEy8uSECQE8jaYo6CNpazYXKG0LL5e8xiXNy', 'laura.rodriguez@coach.com', NULL, 'España', 32, '1.jpg', 'Soy una entrenadora personal con un enfoque en el entrenamiento de fuerza, la nutrición deportiva y su bienestar.', '6 años', NULL, NOW(), NOW()),
(2, 'Pedro Martínez', 'pedromartinez', '$2a$12$kY1SOu8Ef7i9YADA4t2JMO0j.ysik9yF0qhrq3JEs6t/KrMrgonm6', 'pedro.martinez@coach.com', NULL, 'México', 39, '2.jpg', 'Soy un entrenador personal certificado con más de 10 años de experiencia en el entrenamiento de fuerza y el acondicionamiento físico.', '10 años', NULL, NOW(), NOW()),
(3, 'Marcela Díaz', 'marceladiaz', '$2a$12$DmtoVViMYZQHD0yY3Avb9u3OgsOZ6JdM7/RnxkpsT.U7vtt6FRsaC', 'marcela.diaz@coach.com', NULL, 'México', 27, '3.jpg', 'Soy una entrenadora personal certificada con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '4 años', NULL, NOW(), NOW()),
(4, 'Daniel Ramírez', 'danielramirez', '$2a$12$K2QPWE2SnsFdu67SZqtCcObUSuFwAEselfyPhnCrckPFDvOPab6BG', 'daniel.ramirez@coach.com', NULL, 'Estados Unidos', 31, '4.jpg', 'Soy un entrenador personal especializado en el entrenamiento de alta intensidad, la pérdida de peso y la nutrición deportiva.', '7 años', NULL, NOW(), NOW()),
(5, 'Javier Fernández', 'javierfernandez', '$2a$12$xX2KSBu2eQ3WhOYdekYmheLowKCVPJItQFkUK6Osp/pNL4MEXwpZW', 'javier.fernandez@coach.com', NULL, 'España', 35, '5.jpg', 'Soy un entrenador personal certificado con experiencia en el entrenamiento de fuerza, el acondicionamiento físico y la nutrición deportiva.', '9 años', NULL, NOW(), NOW()),
(6, 'Marta Gutiérrez', 'martagutierrez', '$2a$12$VsWNs25ZEbneNQf1ghi4FenhZei9nmxl09SwwPuJk7L5.SWKCIJlO', 'marta.gutierrez@coach.com', NULL, 'México', 29, '6.jpg', 'Soy una entrenadora personal con experiencia en el entrenamiento de fuerza y el acondicionamiento físico. Mi objetivo es ayudar a las personas a mejorar su salud.', '5 años', NULL, NOW(), NOW());

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id`, `title`, `description`, `tips`, `not_eat`, `coach_id`, `created_at`, `updated_at`) VALUES
(1, 'Dieta Mediterránea', 'La dieta mediterránea es una forma de comer basada en los patrones alimentarios tradicionales de los países mediterráneos. Incluye una variedad de alimentos como frutas, verduras, cereales integrales, legumbres, pescado, frutos secos y aceite de oliva. Además, limita la ingesta de carne roja, dulces y alimentos procesados. Esta dieta ha demostrado tener beneficios para la salud cardiovascular, la pérdida de peso y la prevención de enfermedades crónicas.', 'Mantén una dieta equilibrada, bebe suficiente agua, haz ejercicio regularmente y evita el consumo de tabaco y alcohol.', 'Se recomienda evitar los alimentos procesados y refinados, las carnes rojas y los productos lácteos altos en grasa.', 1, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(2, 'Dieta cetogénica', 'La dieta cetogénica es una dieta baja en carbohidratos y alta en grasas que se utiliza para perder peso y mejorar la salud metabólica. Al seguir esta dieta, el cuerpo entra en un estado llamado cetosis, en el cual quema grasa en lugar de carbohidratos para obtener energía. Esta dieta se basa en la ingesta de alimentos ricos en grasas saludables, como aceite de oliva, aguacate, nueces y semillas, junto con proteínas y una cantidad limitada de carbohidratos.', 'Haz un seguimiento de tu ingesta de carbohidratos, asegúrate de obtener suficientes proteínas y grasas saludables y bebe mucha agua.', 'Se deben evitar los alimentos ricos en carbohidratos, como los azúcares, los granos y las frutas con alto contenido de azúcar. También se recomienda limitar el consumo de alcohol y alimentos procesados.', 2, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(3, 'Dieta vegetariana', 'La dieta vegetariana se basa en la exclusión de carne y pescado de la alimentación. Se pueden incluir otros alimentos de origen animal como huevos, leche y queso. Una dieta vegetariana bien equilibrada puede proporcionar todos los nutrientes necesarios para una buena salud, incluyendo proteínas, hierro y calcio. Además, puede ayudar a prevenir enfermedades crónicas como la diabetes y las enfermedades del corazón.', 'Asegúrate de obtener suficientes proteínas de fuentes vegetales, como legumbres, nueces y tofu. Considera tomar suplementos de vitamina B12 y hierro.', 'En una dieta vegetariana se debe evitar cualquier tipo de carne, incluyendo carnes rojas, pollo, pescado y mariscos. También se debe limitar el consumo de productos lácteos y huevos.', 3, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(4, 'Dieta sin gluten', 'La dieta sin gluten se basa en evitar alimentos que contienen gluten, una proteína que se encuentra en el trigo, la cebada y el centeno. Esta dieta se utiliza principalmente para tratar la enfermedad celíaca y la sensibilidad al gluten no celíaca. Se pueden incluir alimentos como frutas, verduras, carne, pescado, huevos y legumbres, así como alimentos sin gluten como arroz, quinoa y maíz.', ' Se deben evitar todos los alimentos que contengan gluten, como el trigo, la cebada, el centeno y la avena. Esto incluye productos de panadería, pastas, cereales y productos procesados que contengan gluten.', 'Lee las etiquetas de los alimentos para evitar ingredientes con gluten. Considera trabajar con un dietista para asegurarte de obtener suficientes nutrientes.', 4, '2023-04-17 18:10:48', '2023-04-17 18:10:48'),
(5, 'Dieta baja en grasas', 'La dieta baja en grasas se basa en limitar la ingesta de grasas, especialmente grasas saturadas y grasas trans. Esta dieta se ha utilizado para ayudar a perder peso y reducir el riesgo de enfermedades crónicas como la enfermedad cardíaca.', '1. Lee las etiquetas de los alimentos para asegurarte de que sean bajos en grasas. 2. Elige alimentos bajos en grasas saturadas y grasas trans. 3. Cocina los alimentos de manera saludable, como al horno o a la parrilla en lugar de freírlos.', ' se deben evitar todos los alimentos que contengan gluten, como el trigo, la cebada, el centeno y la avena. Esto incluye productos de panadería, pastas, cereales y productos procesados que contengan gluten.', 2, '2023-04-17 18:10:48', '2023-04-17 18:10:48');

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
-- Volcado de datos para la tabla `suscriptions`
--

INSERT INTO `suscriptions` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gratuita', 'Suscripción gratuita', 0, '2023-05-03 10:22:03', '2023-05-03 10:22:03'),
(2, 'SuperShapeUp', 'Suscripción SuperShapeUp', 9.99, '2023-05-03 10:22:03', '2023-05-03 10:22:03');

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

INSERT INTO `exercises` (`id`, `name`, `description`, `proposal`, `duration`, `repetitions`, `series`, `explanatory_video`, `tag_of_exercise_id`, `created_at`, `updated_at`) VALUES
(1, 'Hollow Body Hold', 'Ejercicio de core en posición supina que ayuda a fortalecer y estabilizar los músculos abdominales y lumbares', 'Fortalecimiento de core', 30, 10, 3, 'video test', 10, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(2, 'The Roll-Up', 'Ejercicio clásico de Pilates que fortalece los músculos abdominales, lumbares y de la espalda', 'Fortalecimiento de core', 45, 10, 3, 'video test', 2, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(3, 'Burpees', 'Ejercicio de cuerpo completo que implica movimientos explosivos y aumenta la frecuencia cardíaca', 'Mejora del sistema cardiovascular', 60, 15, 4, 'video test', 20, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(4, 'Sprints', 'Serie de carreras cortas a máxima velocidad con pequeños periodos de descanso en medio', 'Mejora de la resistencia', 30, 8, 6, 'video test', 20, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(5, 'Jump Rope', 'Ejercicio de salto de cuerda que mejora la resistencia y la coordinación', 'Mejora de la coordinación y resistencia', 10, 50, 3, 'video test', 15, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(6, 'Jab-Cross-Hook-Upper', 'Serie de cuatro golpes básicos en boxeo que mejoran la técnica y la potencia', 'Mejora de la técnica de boxeo', 30, 10, 3, 'video test', 20, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(7, 'Mountain Climbers', 'Ejercicio que imita el movimiento de escalada de montaña para mejorar la resistencia', 'Mejora de la resistencia', 30, 10, 3, 'video test', 18, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(8, 'Jumping Jacks', 'Ejercicio de cuerpo completo que involucra saltos y mejora la coordinación', 'Mejora de la coordinación', 60, 20, 3, 'video test', 6, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(9, 'Bicycle Crunches', 'Ejercicio de core que fortalece los músculos abdominales, lumbares y de la espalda', 'Fortalecimiento de core', 30, 20, 3, 'video test', 6, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(10, 'Squats', 'Ejercicio de fuerza que involucra las piernas y glúteos para mejorar la resistencia', 'Mejora de la resistencia muscular', 60, 15, 4, 'video test', 18, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(11, 'Sprint de 50 metros', 'Corre a máxima velocidad durante 50 metros', 'Mejorar la velocidad en carrera corta', 15, 1, 5, 'video test', 19, '2023-04-17 18:54:00', '2023-04-17 18:54:00'),
(12, 'Escalera de agilidad', 'Realiza diferentes ejercicios de agilidad y coordinación en la escalera', 'Mejorar la agilidad y coordinación', 20, 2, 3, 'video test', 14, '2023-04-17 18:54:00', '2023-04-17 18:54:00');

-- --------------------------------------------------------

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
(20, 'ingredient_20', 17, '2023-04-17 19:26:16', '2023-04-17 19:26:16');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `description`, `duration`, `level`, `coach_id`, `created_at`, `updated_at`) VALUES
(1, 'Entrenamiento de fuerza', 'Mejora tu fuerza y resistencia muscular con este entrenamiento de alta intensidad', 60, 'High', 2, '2023-04-17 18:11:39', '2023-04-17 18:11:39'),
(2, 'Entrenamiento de yoga', 'Alcanza la paz interior y flexibilidad con este entrenamiento de yoga para principiantes', 45, 'Low', 4, '2023-04-17 18:11:39', '2023-04-17 18:11:39'),
(3, 'Entrenamiento de boxeo', 'Mejora tu coordinación, agilidad y resistencia cardiovascular con este entrenamiento de boxeo', 75, 'Medium', 1, '2023-04-17 18:11:39', '2023-04-17 18:11:39'),
(4, 'Entrenamiento de spinning', 'Quema calorías y mejora tu resistencia cardiovascular con este entrenamiento de spinning de alta intensidad', 45, 'High', 3, '2023-04-17 18:11:39', '2023-04-17 18:11:39'),
(5, 'Entrenamiento de pilates', 'Fortalece y tonifica tus músculos con este entrenamiento de pilates para todos los niveles', 30, 'Medium', 5, '2023-04-17 18:11:39', '2023-04-17 18:11:39');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `training_categories`
--

INSERT INTO `training_categories` (`id`, `training_id`, `category_of_training_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(2, 1, 6, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(3, 2, 12, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(4, 2, 4, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(5, 3, 7, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(6, 3, 10, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(7, 3, 1, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(8, 3, 11, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(9, 4, 6, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(10, 4, 1, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(11, 5, 5, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(12, 5, 11, '2023-04-17 18:24:04', '2023-04-17 18:24:04'),
(13, 5, 12, '2023-04-17 18:24:04', '2023-04-17 18:24:04');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `training_exercises`
--

INSERT INTO `training_exercises` (`id`, `training_id`, `exercise_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(2, 5, 2, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(3, 4, 3, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(4, 4, 4, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(5, 3, 5, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(6, 3, 6, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(7, 2, 7, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(8, 2, 8, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(9, 1, 9, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(10, 1, 10, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(11, 1, 11, '2023-04-17 19:01:15', '2023-04-17 19:01:15'),
(12, 2, 12, '2023-04-17 19:01:15', '2023-04-17 19:01:15');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `email_verified_at`, `status`, `country`, `age`, `height`, `weight`, `suscription_id`, `remember_token`, `created_at`, `updated_at`) VALUES 
(1, 'Mario Rufo', 'mariorufo', '$2a$12$p57BZT0cjQeKfUwMGI3efuFWJ0pMxK2wW9ttPbkPJRi6g.mVDRYYy', 'mario.admin@shapeup.com', NOW(), 'Admin', 'España', 19, 185, 90, 2, null, NOW(), NOW()),
(2, 'Manuel Moya', 'manuelmoya', '$2a$12$NL5BJzESTRJ3aeE2WHrWf.kfzRNcIhBYfGAUjYLsZLlIeVU.NJlNG', 'manuel.admin@shapeup.com', NOW(), 'Admin', 'España', 19, 180, 80, 2, null, NOW(), NOW()),
(3, 'José Fernández', 'josefernandez', '$2a$12$gN7dKWejwuXhXkX4BT.3JOqUBWcxJ.BXg9MFWUDhqp/gRT1kpc12a', 'jose.admin@gmail.com', NOW(), 'Admin', 'España', 20, 176, 70, 2, null, NOW(), NOW()),
(4, 'Javier García', 'javiergarcia', '$2a$12$K2Hn.stc85VAdD64qs5VRuLrg2S1l2upFywoii76VbK1qoQ9Pn9o.', 'javier.garcia@gmail.com', NOW(), 'User', 'España', 30, 180, 80, 1, null, NOW(), NOW()),
(5, 'Sofía Hernández', 'sofiahernandez', '$2a$12$5z8K5TsAey1slm5GdgASzO6JHwQKwHr0UxPAOIE.FWspyQyt6fX1a', 'sofia.hernandez@gmail.com', NOW(), 'User', 'México', 28, 165, 65, 1, null, NOW(), NOW()),
(6, 'Diego Gómez', 'diegogomez', '$2a$12$pS9s5Q1lx8B6o2oLOZMATuLku2JlgURs5a68ZOBcWgoXBXoEOU30.', 'diego.gomez@gmail.com', NOW(), 'User', 'Colombia', 35, 175, 75, 2, null, NOW(), NOW()),
(7, 'Marta Fernández', 'martafernandez', '$2a$12$t5Q5KjkkQZW5JM.Rgl.uC.MVKMMp2ktFfLgidIVYB8FUcNI1V5xGK', 'marta.fernandez@gmail.com', NOW(), 'User', 'España', 25, 160, 55, 1, null, NOW(), NOW()),
(8, 'Carlos Sánchez', 'carlossanchez', '$2a$12$IfX9oQfAb.jmOr55QTGVMeJ8uGPlZ9a0qMPMy55RUpGIPA/xzwF/G', 'carlos.sanchez@gmail.com', NOW(), 'User', 'México', 32, 185, 85, 1, null, NOW(), NOW()),
(9, 'Ana Martínez', 'anamartinez', '$2a$12$Ah3sQNdyDjMoByja9CbCdO3vZ1LKjEpFIID6oP9WYln.f47aPYveq', 'ana.martinez@gmail.com', NOW(), 'User', 'España', 29, 170, 70, 2, null, NOW(), NOW()),
(10, 'Rubén López', 'rubenlopez', '$2a$12$QL8EUyuhzupZQZb4U7ABV.c8MnWpPNb8oIHB.zRCO3i2pRdGly7XO', 'ruben.lopez@gmail.com', NOW(), 'User', 'España', 27, 175, 75, 1, null, NOW(), NOW()),
(11, 'María Torres', 'mariatorres', '$2a$12$XkkKTIYTSzDMlRTi5VNbbe4WC7N4ZSw.l2Uk98er7xHfuzhjsllZq', 'maria.torres@gmail.com', NOW(), 'User', 'España', 31, 170, 60, 1, null, NOW(), NOW()),
(12, 'Alejandro Ruiz', 'alejandroruiz', '$2a$12$gnLTBIeLyXpOZWS6zsDe2eJUDz3du9RQ2V.aJ466L2qfj8JwEDejG', 'alejandro.ruiz@gmail.com', NOW(), 'User', 'México', 29, 175, 70, 2, null, NOW(), NOW()),
(13, 'Laura García', 'lauragarcia', '$2a$12$WCJ2h1GNcjf9enfYCeYP/.6tJliPeVcE0EIGVHauE32FXjiQ94bYy', 'laura.garcia@gmail.com', NOW(), 'User', 'España', 26, 165, 55, 1, null, NOW(), NOW()),
(14, 'Jorge Gutiérrez', 'jorgegutierrez', '$2a$12$ovvzTIQvr6O1NgCjIMoMc.zJWU5KQRY4Jp6qSdMXMI5nS18fXDElG', 'jorge.gutierrez@gmail.com', NOW(), 'User', 'España', 33, 180, 85, 1, null, NOW(), NOW()),
(15, 'Carmen Moreno', 'carmenmoreno', '$2a$12$pIPLhf62t55Yvfof/74CsubTGf9fo6h.508Sl.7zsyhR91HRBMC/2', 'carmen.moreno@gmail.com', NOW(), 'User', 'España', 30, 170, 65, 1, null, NOW(), NOW()),
(16, 'Juan Martín', 'juanmartin', '$2a$12$/VoXOfXCCAlZv593NbCdteYi6jdfGWfOhaU0.BT.PhUKvmptdXABO', 'juan.martin@gmail.com', NOW(), 'User', 'España', 28, 175, 75, 2, null, NOW(), NOW()),
(17, 'Lucía García', 'luciagarcia', '$2a$12$.eZUyX5nSgzLpdKcA1..V.kZDuSBf4uuT8YXhIIrIqed0KrW76OHi', 'lucia.garcia@gmail.com', NOW(), 'User', 'España', 27, 165, 60, 1, null, NOW(), NOW()),
(18, 'Antonio Ruiz', 'antonioruiz', '$2a$12$Bl6arVxWy6.9FzfQZ4H6X.U1K4jI5hxhgJH0ODXDhWBiz8J0b4pLa', 'antonio.ruiz@gmail.com', NOW(), 'User', 'Argentina', 31, 180, 80, 1, null, NOW(), NOW()),
(19, 'Cristina González', 'cristinagonzalez', '$2a$12$kLKpGkKkwumkS2hLSRt2HOEMFD4s4v1MHpvSHNbUbIyEd7i7ss2dW', 'cristina.gonzalez@gmail.com', NOW(), 'User', 'España', 29, 170, 65, 1, null, NOW(), NOW()),
(20, 'Miguel López', 'miguellopez', '$2a$12$bd1ntx05wGbYhjg4Mc1m/eCs2JuUDcGoy8eXHbCTWufPlwPw.VJtG', 'miguel.lopez@gmailgmail.com', NOW(), 'User', 'España', 35, 175, 75, 1, null, NOW(), NOW()),
(21, 'Isabel Fernández', 'isabelfernandez', '$2a$12$TjyXJQFCz7Iw.QKcTz8eVOAU1/WUBJDRyFgAY5.4xKmw5Ih1OdqwO', 'isabel.fernandez@gmail.com', NOW(),'User', 'España', 25, 160, 55, 2, null, NOW(), NOW()),
(22, 'Francisco Sánchez', 'franciscosanchez', '$2a$12$5BhdWSVp6ZqjHMFZ2YTrS.ugCpCDNDSJiHauPt5.6xR0RT6.jwYnC', 'francisco.sanchez@gmail.com', NOW(), 'User', 'España', 32, 185, 85, 1, null, NOW(), NOW()),
(23, 'Pablo García', 'pablogarcia', '$2a$12$gxRsg95aYRCmb8AJB4HkNOw0CnZiPceIIjEFMs4TOV45ESot09llW', 'pablo.garcia@gmail.com', NOW(), 'User', 'España', 27, 175, 75, 1, null, NOW(), NOW());

-- --------------------------------------------------------