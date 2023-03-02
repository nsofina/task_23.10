<?php

declare(strict_types=1);

//интерфейс движения
interface CarMotionInterface
{
    public function motion();
}
//интерфейс сигнала
interface CarSignalInterface
{
    public function signal();
}
//интерфейс работы дворников
interface CarWipersInterface
{
    public function wipers();
}

//абстрактный класс машин
abstract class Cars implements CarMotionInterface, CarSignalInterface, CarWipersInterface
{

    //движение машин одинаковое у всех
    public function motion()
    {
        echo "Поехали!" . ' <br/>' . PHP_EOL;
    }
    //сигнал разный у разных машин
    abstract public function signal();

    //дворники есть у всех машин
    public function wipers()
    {
        echo "Дворники работают" . ' <br/>' . PHP_EOL;
    }
}
//класс легковых машин
class PassengerCar extends Cars
{
    //пришлось ввести переменные, так как php ругался
    private $color;
    private $upholstery;
    private $seats;

    public function getColor()
    {
        return $this->color;
    }

    public function getUpholstery()
    {
        return $this->upholstery;
    }

    public function getSeats()
    {
        return $this->seats;
    }
    //конструктор класса
    public function __construct(string $color, string $upholstery, int $seats)
    {
        $this->color = $color;
        $this->upholstery = $upholstery;
        $this->seats = $seats;
        echo "____________________"  . ' <br/>' . "Легковая машина" . ' <br/>' . "____________________"  . ' <br/>';
        echo "Цвет: " . $color . ";" . ' <br/>' . PHP_EOL;
        echo "Отделка салона: " . $upholstery . ";" . ' <br/>' . PHP_EOL;
        echo "Количество мест: " . $seats . "." . ' <br/>' . PHP_EOL;
    }
    public function signal()
    {
        echo "Бип!" . ' <br/>' . PHP_EOL;
    }
    //при вызове класса как метода
    public function __invoke()
    {
        function oxide()
        {
            echo "Ускорение..." . ' <br/>' . PHP_EOL;
        }

        oxide();
    }
}

//класс танков
class Panzer extends Cars
{
    //пришлось ввести переменные, так как php ругался
    private $armor;
    private $bullets;

    public function getBullets()
    {
        return $this->bullets;
    }

    public function getArmor()
    {
        return $this->armor;
    }

    //конструктор класса
    public function __construct(int $armor, int $bullets)
    {
        $this->armor = $armor;
        $this->bullets = $bullets;
        echo "____________________"  . ' <br/>' . "Танк" . ' <br/>' . "____________________"  . ' <br/>';
        echo "Броня: " . $armor . ";" . ' <br/>' . PHP_EOL;
        echo "Количество снарядов: " . $bullets . "." . ' <br/>' . PHP_EOL;
    }

    //у танков нет звукового сигнала, поэтому сделаем холостой выстрел
    public function signal()
    {
        echo "Холостой выстрел!" . ' <br/>' . PHP_EOL;
    }

    //при вызове класса как метода
    public function __invoke()
    {
        function shoot()
        {
            echo "Выстрел!" . ' <br/>' . PHP_EOL;
        }
        shoot();
    }
}

class Bulldozer extends Cars
{
    //пришлось ввести переменные, так как php ругался
    private $brend;
    private $power;

    public function getBrend()
    {
        return $this->brend;
    }

    public function getPower()
    {
        return $this->power;
    }

    //конструктор класса
    public function __construct(string $brend, int $power)
    {
        $this->brend = $brend;
        $this->power = $power;
        echo "____________________"  . ' <br/>' . "Бульдозер" . ' <br/>' . "____________________"  . ' <br/>';
        echo "Марка: " . $brend . ";" . ' <br/>' . PHP_EOL;
        echo "Мощность: " . $power . "." . ' <br/>' . PHP_EOL;
    }

    //есть звуковой сигнал и оповещение
    public function signal()
    {
        echo "Осторожно, работает спецтехника! Бииип!" . ' <br/>' . PHP_EOL;
    }

    //при вызове класса как метода
    public function __invoke()
    {
        function bucket()
        {
            echo 'Бульдозер роет ковшом' . ' <br/>' . PHP_EOL;
        }

        bucket();
    }
}

//полиморфная функция, демонстрирующая экземпляр класса
function demonstration(Cars $car)
{
    $car->motion();
    $car->signal();
    $car->wipers();
    $car();
}

//экземпляр класса танк
$tank = new Panzer(12, 20);
demonstration($tank);

//экземпляр класса бульдозер
$machine = new Bulldozer("HITACHI", 120);
demonstration($machine);

//экземплр класса легковая машина
$car = new PassengerCar("white", "alkantara", 5);
demonstration($car);