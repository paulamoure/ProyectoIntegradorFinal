<?php
// Datos de conexión a la base de datos
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'Brainwave';

// Crear conexión
$conn = new mysqli( $servername, $username, $password, $database );

// Verificar la conexión
if ( $conn->connect_error ) {
    die( 'Error de conexión: ' . $conn->connect_error );
} else {
    echo 'Conexión exitosa a la base de datos!<br>';
}

// Crear tablas si no existen
$sql = "
CREATE TABLE users (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  password text NOT NULL,
  nombre varchar(255) DEFAULT NULL,
  apellidos varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  descrption varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE psychologists (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  img varchar(46) NOT NULL,
  name text NOT NULL,
  detail text NOT NULL,
  number text NOT NULL,
  email text NOT NULL,
  expert text NOT NULL,
  modality varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO psychologists (img, name, detail, number, email, expert, modality) VALUES
('../img/1.png', 'Laura López', 'Saludos, soy Laura, y estoy aquí para ayudarte a descubrir y aprovechar tus fortalezas internas. En nuestro viaje terapéutico, exploraremos juntos cómo tu mente única, propia del TDAH, puede ser una fuente de creatividad y talento. Trabajaremos para potenciar esas cualidades y gestionar los aspectos más desafiantes de manera efectiva.', '640 111 111', 'mailto:laura@gmail.com', '• TERAPIA FAMILIAR \\n • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'presential'),
('../img/2.png', 'Lucas Dutchenberg', '¡Hola! Soy Lucas, un psicólogo comprometido con el bienestar de las personas. Mi enfoque para trabajar con el Trastorno por Déficit de Atención e Hiperactividad (TDAH) se centra en la colaboración y la comprensión educativa. Juntos, exploraremos estrategias personalizadas para maximizar tus fortalezas y superar los desafíos asociados con el TDAH.', '640 123 456', 'mailto:lucas@gmail.com', '• TERAPIA FAMILIAR • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'virtual'),
('../img/3.png', 'Cristina Ramirez', 'Bienvenido, soy Cristina, una psicóloga comprometida con tu crecimiento personal. En nuestro tiempo juntos, exploraremos las dimensiones únicas de tu personalidad con TDAH. A través de la autoexploración, aprenderemos a gestionar las distracciones y a potenciar tus habilidades para que puedas alcanzar tu máximo potencial.', '640 234 567', 'mailto:cristina@gmail.com', '• TERAPIA FAMILIAR • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'presential'),
('../img/4.png', 'Ruth Martínez', 'Hola, soy Ruth, y estoy aquí para acompañarte en el desarrollo de habilidades de adaptación efectivas frente al TDAH. Trabajaremos en estrategias concretas para lidiar con la impulsividad, la distracción y la hiperactividad, permitiéndote tener un mayor control sobre tu vida y alcanzar tus metas.', '640 345 678', 'mailto:ruth@gmail.com', '• TERAPIA FAMILIAR • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'virtual'),
('../img/5.png', 'Luis Caturla', 'Saludos, soy Luis, y estoy comprometido no solo contigo, sino también con tu familia. Juntos, abordaremos el TDAH desde una perspectiva integral, considerando cómo afecta a todos. A través de estrategias familiares y apoyo emocional, trabajaremos para crear un entorno que fomente el crecimiento y la resiliencia.', '640 456 789', 'mailto:luis@gmail.com', '• TERAPIA FAMILIAR • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'presential'),
('../img/6.png', 'María Lilliput', '¡Hola! Soy María, y mi enfoque es guiarte hacia el empoderamiento a través de la autoconciencia. Juntos, exploraremos cómo el TDAH impacta tu vida cotidiana y desarrollaremos estrategias personalizadas. Este viaje no solo se trata de gestionar los desafíos, sino de reconocer y potenciar tus capacidades únicas.', '640 567 890', 'mailto:maria@gmail.com', '• TERAPIA FAMILIAR • PSICOLOGÍA INFANTIL • PSICOLOGÍA DE LA ADOLESCENCIA . PSICOANÁLISIS', 'virtual');

CREATE TABLE appts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_patient VARCHAR(100) DEFAULT NULL,
  id_psych int(11) DEFAULT NULL,
  date varchar(255) DEFAULT NULL,
  hour varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;  

CREATE TABLE IF NOT EXISTS contact (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  email VARCHAR(255),
  asunto VARCHAR(255),
  mensaje TEXT,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// Ejecutar consultas
if ( $conn->multi_query( $sql ) === TRUE ) {
    echo "Tablas creadas correctamente y datos iniciales insertados en la tabla 'login'.<br>";
} else {
    echo 'Error al crear las tablas: ' . $conn->error . '<br>';
}
// Devolver la conexión
return $conn;
?>