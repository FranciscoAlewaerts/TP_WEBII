<?php
require_once "./app/config/config.php";
class DbHelper
{

    public static function connect_db()
    {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            $conn = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
            $sql = "CREATE DATABASE " . DB_NAME;
            $conn->exec($sql);

            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);

            $sql = "CREATE TABLE `categorias` (
                    `id` int(11) NOT NULL,
                    `nombre` varchar(80) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE `categorias`
                ADD PRIMARY KEY (`id`);
                ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
                  ";
            $conn->exec($sql);

            $sql = "INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Piernas'),
(2, 'Mochila'),
(4, 'Calzado'),
(7, 'Manos'),
(8, 'Pantalon');
";
            $conn->exec($sql);

            $sql = "CREATE TABLE `productos` (
                    `id` int(11) NOT NULL,
                    `nombre` varchar(255) NOT NULL,
                    `categoria` int(11) NOT NULL,
                    `precio` decimal(8,2) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
                  ";
            $conn->exec($sql);

            $sql = "INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`) VALUES
                (1, 'Nike Running', 4, 12999.00),
                (2, 'Jean Megan', 1, 25499.00),
                (3, 'Vans u SK8-Low', 4, 47000.00),
                (13, 'Aventura', 2, 5000.00);";
            $conn->exec($sql);


            $sql = "CREATE TABLE `usuarios` (
                    `id_usuario` int(11) NOT NULL,
                    `email` varchar(50) NOT NULL,
                    `password` varchar(100) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);
  ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
                  ";
            $conn->exec($sql);


            $sql = "INSERT INTO `usuarios` (`id_usuario`, `email`, `password`) VALUES
                (1, 'webadmin', '$2y$10\$OqdXpUNyTcQ5rSoJEXAv2OYQOKSH1K1l5iTvGpiAetI6hy0MeQESy');
                ";
            $conn->exec($sql);

            
            return $conn;
        }
    }
}
