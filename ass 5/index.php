<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
</head>
<body>
    <h2>Shape Area Calculator</h2>

    <form method="post">
        <input type="radio" name="shape" value="triangle" checked> Triangle<br>
        <input type="radio" name="shape" value="square"> Square<br>
        <input type="radio" name="shape" value="circle"> Circle<br>
        <br>
        <input type="submit" value="Calculate Area">
    </form>

    <?php
    // Define the Shape class
    class Shape {
        protected $name;

        public function __construct($name) {
            $this->name = $name;
        }

        public function getArea() {
            return "Area calculation not implemented for shape $this->name.";
        }
    }

    // Define the Triangle class
    class Triangle extends Shape {
        private $base;
        private $height;

        public function __construct($base, $height) {
            parent::__construct("Triangle");
            $this->base = $base;
            $this->height = $height;
        }

        public function getArea() {
            return 0.5 * $this->base * $this->height;
        }
    }

    // Define the Square class
    class Square extends Shape {
        private $side;

        public function __construct($side) {
            parent::__construct("Square");
            $this->side = $side;
        }

        public function getArea() {
            return $this->side * $this->side;
        }
    }

    // Define the Circle class
    class Circle extends Shape {
        private $radius;

        public function __construct($radius) {
            parent::__construct("Circle");
            $this->radius = $radius;
        }

        public function getArea() {
            return pi() * $this->radius * $this->radius;
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $shapeType = $_POST["shape"];
        $area = "";

        switch ($shapeType) {
            case "triangle":
                $triangle = new Triangle(5, 7); // Example dimensions
                $area = $triangle->getArea();
                break;
            case "square":
                $square = new Square(4); // Example dimension
                $area = $square->getArea();
                break;
            case "circle":
                $circle = new Circle(3); // Example radius
                $area = $circle->getArea();
                break;
            default:
                $area = "Please select a shape.";
        }

        echo "<p>Area of $shapeType: $area</p>";
    }
    ?>

</body>
</html>
