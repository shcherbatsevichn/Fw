<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "Fw/init.php";
if(!defined(CORE_INIT)) {
    die();
}

$fomparams = ["additional_class"=>"window--full-form", "attr"=>["data-form-id" => "form-123", "data-btn-id" => "btn-123", "data-btn-title" => "Отправить"],"method"=> "post", "action"=> "",
    "elements"=>[
        ["content" => "This is the test for." ,"type" => "textarea"],
        ["title" => "My Input" ,"type" => "text", "name" => "my-inp", "default" => "enter something", "attr" => ['data-id' => 17], "additional_class" => 'js-login'],
        ["title" => "My Inputmult" ,"type" => "text-multiple","name" => "my-inp", "list" => [
            ["default" => "enter something", "attr" => ['data-id' => 17], "additional_class" => 'js-login']
            ]
        ],
        ["title" => "My psw" ,"type" => "password", "name" => "my-psw", "default" => "enter password", "attr" => ['data-id' => 18], "additional_class" => 'js-psw'],
        ["title" => "My number" ,"type" => "number", "name" => "my-number", "default" => "enter number", "attr" => ['data-id' => 22], "additional_class" => 'js-num'],
        ["title" => "Выбери меня" ,"type" => "checkbox", "name" => "my-chb", "attr" => ['data-id' => 19], "additional_class" => 'js-chb'],
        ["title" => "И меня выбери тоже" ,"type" => "checkbox", "name" => "my-chb2", "attr" => ['data-id' => 20], "additional_class" => 'js-chb2'],
        ["title" => "Выберите сервер" ,"type" => "select", "name" => "my-sel", "attr" => ['data-id' => 21], "additional_class" => 'js-sel', "list" => [
            ["title" => "Онлайнер", "value" => "onliner", "additional_class" => 'onliner', "attr" => ['data-id' => 211], "selected" => true],
            ["title" => "ТутБай", "value" => "tutby", "additional_class" => 'tutby', "attr" => ['data-id' => 212]]
            ]
        ],
        ["title" => "Выберите утверждение" , "type" => "radio", "name"=>"testradio", "list" => [
            ["title" => "Case 1", "additional_class" => 'onliner', "attr" => ['data-id' => 211]],
            ["title" => "Case 2", "additional_class" => 'tutby', "attr" => ['data-id' => 212]]
            ]
        ]
    ]
];

$app->header();
$app->pager->setProperty("footertrtext", "The project is under development. Pleas, sten by ");
$app->pager->setProperty("headtext", "Framework by Nikita Shcherbatsevich");
$app->pager->setProperty("keywords", "Framework, PHP, HTML");
$app->pager->setProperty("title", "Fw progress");
$app->pager->addCss("/Fw/libs/bootstrap-5.1.3-dist/css/bootstrap.css");// подключение стилей
$app->pager->addCss("/Fw/templates/default_template/css/style.css");// подключение стилей
try{
    echo "<div class=\"container\"><div class=\"row\"><div class=\"col\">";
    $app->includeComponent("Fw\Components\Clocker:DigitalClock", "default_template", ["date" => "18.01.2022"]); //подключаем компонент отсчёта дней с начала разработки Fw
    echo "</div> <div class=\"col\">";
    $app->includeComponent("Fw\Components\Calculator:CalcSumm", "violet", ["a" => 2, "b" => 3]);// тестовый компонент калькулятор 
    echo "</div> </div> </div>";
}
catch (Exception $e){
    echo "<div class=\"error\">", $e->getMessage(), "</div>", "\n";
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-center">Пример тестовой формы</h3>
        </div>
        <div class="col">
            <?=$app->includeComponent("Fw\Components\Forms:Render", "default", $fomparams);
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
                <h3>11.02.2021</h3>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Тесты</li>
                    <li class="list-group-item">Исправлена ошибка рендера формы, не подгружался шаблон</li>
                    <li class="list-group-item">Изменена логика работы компонента рендера формы, подключение компонентов через Application</li>
                    <li class="list-group-item">Тест нагрузки</li>
                    <li class="list-group-item">Правка багов</li>
                </ol>
        </div>
        <div class="col">
                <h3>10.02.2021</h3>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Подключен Bootstrap</li>
                    <li class="list-group-item">Создана верстка главной страницы Fw</li>
                    <li class="list-group-item">Реализован компонент текстового инпута</li>
                    <li class="list-group-item">Реализован компонент рендера формы</li>
                    <li class="list-group-item">Реализован компонент инпута с select</li>
                    <li class="list-group-item">Реализован компонент инпута с radio</li>
                    <li class="list-group-item">Реализован компонент инпута с number</li>
                    <li class="list-group-item">Реализован компонент инпута с checkbox</li>
                    <li class="list-group-item">Реализован компонент инпута с textarea</li>
                </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>03.02.2021</h3>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Исправлен баг (Проблема с отображением одинаковых шаблонов с одинаковыми стилями (один отображается, второй - нет));</li>
                <li class="list-group-item">Исправлена функция Template::render (реализован параметр $page);</li>
                <li class="list-group-item">Классы Request и Server заполнены соответстующими супер-глобальными переменными;</li>
                <li class="list-group-item">Тестирование;</li>
                <li class="list-group-item">Удаление отладочной информации;</li>
                <li class="list-group-item">Комментирование кода;</li>
                <li class="list-group-item">Убраны "магические" цифры из массивов с данными result и param компонентов;</li>
                <li class="list-group-item">Исправлен вид переменных в шаблоне;</li>
                <li class="list-group-item">Исправлены компоненты - логика компонента внесена в класс самого компонента;</li>
                <li class="list-group-item">Исправлен Application::includeComponent() - оптимизирована работа с контейнером $__components;</li>
                <li class="list-group-item">Исправлены компоненты - логика компонента внесена в класс самого компонента;</li>
                <li class="list-group-item">В Component\Template подлючен класс компонета, для полученя всех необходимых параметров;</li>
                <li class="list-group-item">Тестирование.</li>
            </ol>
        </div>
        <div class="col">
            <h3>02.02.2021</h3>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Настройка и отладка подключения шаблона;</li>
                <li class="list-group-item">Тест работоспособности;</li>
                <li class="list-group-item">Исправлен баг с файлом coinfig (метод get искал только на верхнем уровне (нет, был не верно сконфигурирован конфиг));</li>
                <li class="list-group-item">Исправлена структура файла config;</li>
                <li class="list-group-item">Произведена проверка подключения стилей к шаблонам компонента и к шаблонам страниц;</li>
                <li class="list-group-item">Исправлены баги подключения;</li>
                <li class="list-group-item">Проверка замены макросов в css, js  и тд на пустую строку; </li>
                <li class="list-group-item">Данный функционал был реализован ранее;</li>
                <li class="list-group-item">Проверка отсутсвия функция отладки (echo и т.д.);</li>
                <li class="list-group-item">Проверка соответствию тз;</li>
                <li class="list-group-item">Тест подключения другого шаблона компанента;</li>
                <li class="list-group-item">Тест подключения двух одинаковых шаблонов (упала страница);</li>
                <li class="list-group-item">Реализована возможность подключения нескольких компонентов на одну страницу.</li>
                <li class="list-group-item">Реализована функция динамического создания url в Component\Template</li>
                <li class="list-group-item">Убраны пути к компонтам из config;</li>
                <li class="list-group-item">Исправлен алгоритм поика классов в Application::includeComponent();</li>
                <li class="list-group-item">Тестирование (Проблема с отображением одинаковых шаблонов с одинаковыми стилями (один отображается, второй - нет))</li>
                <li class="list-group-item">Настроен и подключен компонент с входными и выходынми параметрами.</li>
                <li class="list-group-item">Исправлены шаблоны компонентов.</li>
                <li class="list-group-item">Подключена передача параметров result и param  в Component\Template</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <details>
                <summary><h3>01.02.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Описан класс Base</li>
                        <li class="list-group-item">Описан класс Template</li>
                        <li class="list-group-item">Описан класс Request</li>
                        <li class="list-group-item">Описан класс Server</li>
                        <li class="list-group-item">Описан класс Dictionary</li>
                        <li class="list-group-item">Заведена файловая структура шаблона</li>
                        <li class="list-group-item">Описана минимальная логика шаблона.</li>
                        <li class="list-group-item">Реализация методов Base и Template</li>
                        <li class="list-group-item">Модернизация класса apllication</li>
                    </ol>
            </details>
        </div>
        <div class="col">
            <details>
                <summary><h3>31.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Получена следющая задача</li>
                        <li class="list-group-item">Исправлен порядок новостей в индексномфале</li>
                    </ol>
            </details>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <details>
                <summary><h3>28.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Исправена функция Page::resartBuffer;</li>
                        <li class="list-group-item">Исправлено расположение файлов в проекте;</li>
                        <li class="list-group-item">Проведение теста работоспособности, подправлены маршруты шаблонов;</li>
                        <li class="list-group-item">Удалено лишнее подключение файлов в шаблонах footer и header;</li>
                        <li class="list-group-item">Исправлена логика вывода макросов js, css, str</li>
                        <li class="list-group-item">Исправлена логика добавления и хранения js, css, str - элементов;</li>
                        <li class="list-group-item">Исправлена логика подмены макросов;</li>
                        <li class="list-group-item">Проведены тесты.</li>
                        <li class="list-group-item">Исправлен баг дублирования css-ссылок на страницу.</li>
                        <li class="list-group-item">Испавлен баг, при котором все объекты property не отображались на странице.</li>
                        <li class="list-group-item">Написана функция для генерации имен макросов.</li>
                    </ol>
            </details>
        </div>
        <div class="col">
            <details>
                <summary><h3>27.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Исправлена логика работы всех функций в кассе Page;</li>
                        <li class="list-group-item">Реализовано подключение макросов в шаблон сайта; </li>
                        <li class="list-group-item">Иправлен нейминг переменных;</li>
                        <li class="list-group-item">Исправлена логика работы функции showHead;</li>
                        <li class="list-group-item">Исправлена логика хранения ссылок на js и css (ключи в массиве);</li>
                        <li class="list-group-item">Проведен тест работоспособности.</li>
                    </ol>
            </details>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <details>
                <summary><h3>26.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Отправлен на проверку;</li>
                        <li class="list-group-item">Исправлено пространство имен на Fw\Core...;</li>
                        <li class="list-group-item">Исключены прямые подключения файлов в классах. Работа только за счёт функции автозагрузки.</li>
                        <li class="list-group-item">Исправлена функция Application::restartBuffer;</li>
                        <li class="list-group-item">Исправлена логика работы header и footer;</li>
                        <li class="list-group-item">Исправлено подключение файлов шаблона;</li>
                        <li class="list-group-item">Инициализирован экзмпляр класса Config в Application, для подключения шаблона.</li>
                    </ol>
            </details>      
        </div>
        <div class="col">
            <details>
                <summary><h3>25.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Описана  функция addString класса Page;</li>
                        <li class="list-group-item">В функциях addSJs и addCss была изменена функция разбития строки на массив;</li>
                        <li class="list-group-item">Настроена буферизация;</li>
                        <li class="list-group-item">Реализовано подключение init на индексную страницу;</li>
                        <li class="list-group-item">Реализована проверка наличия глобальной константы на индексной странице;</li>
                        <li class="list-group-item">Добавлены макросы в тестовый шаблон.</li>
                        <li class="list-group-item">Реализована сборка тестового шаблона и подключение его на индексную страницу;</li>
                        <li class="list-group-item">Тест сборки;</li>
                        <li class="list-group-item">Тест реализации подмены макросов на реальные значения;</li>
                        <li class="list-group-item">Описана фукнкция Page->showProperty;</li>
                        <li class="list-group-item">Переделан способ храниня иформации в массиве класса Page (ключи теперь содержат сам макрос), сделано это для упрощения алгоритма поиска изамены.</li>
                        <li class="list-group-item">Пофикшен баг, выводящий лишний символ при подключени heaer</li>
                        <li class="list-group-item">Описана фукнкция Page->getAllReplace;</li>
                        <li class="list-group-item">Описана фукнкция Page->showHead.</li>
                    </ol>
            </details>  
        </div>
    </div>
    <div class="row">
        <div class="col">
        <details>
                <summary><h3>24.01.2021</h3></summary>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Создана структура шаболнов сайта;</li>
                        <li class="list-group-item">Создан файл index.php;</li>
                        <li class="list-group-item">init.php объявлена глобальная переменная CORE_INIT;</li>
                        <li class="list-group-item">Создан трейт для антипаттерна Singleton, размещен в отдельную папку;</li>
                        <li class="list-group-item">Создан класс Page, реализованы функции addJs, addCss, setProerty, getProperty;</li>
                        <li class="list-group-item">В класс Application были добавлены функции header, footer, startBuffer, endBuffer, restartBuffer.(описан минимальный функционал);</li>
                        <li class="list-group-item">ID шалона внесен в конфиг;</li>
                        <li class="list-group-item">Протестирована функция автозагрузки, исправлены ошибки в неймспейсах;</li>
                        <li class="list-group-item">Протестирована правильностьподключения всех классов, имеющх реализацию на данном этапе;</li>
                        <li class="list-group-item">Протестирована работоспособность вех реализованных функций;</li>
                        <li class="list-group-item">Описана минимальная начинка для шаблонов;</li>
                        <li class="list-group-item">Инициализирован объект Application в init.php;</li>
                    </ol>
            </details>  
        </div>
    </div>
</div>


<?php
$app->footer();
?>
