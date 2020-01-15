<?php


namespace App\DesignPatterns\Fundamental\Delegation;


use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;

/**
 * Class AppMessenger
 *
 * @package App\DesignPatterns\Fundamental\Delegation
 *
 * Демонстрация шаблона проектирования - "Делегирование (Delegation)"
 *
 * @url https://ru.wikipedia.org/wiki/Шаблон_делегирования
 */
class AppMessenger implements MessengerInterface
{
    /**
     * @var MessengerInterface
     */
    private $messenger;

    /**
     * AppMessenger constructor.
     */
    public function __construct()
    {
        $this->toEmail();
    }

    /**
     * @return string
     */
    static public function getDescription(){
        return <<<'DSC'
<div class="card-header">
    <div class="text-justify"><em>App\Http\Controllers\FundamentalPatternsController@Delegation</em></div>
</div>

<div class="card-body">
    <p class="card-text">
        <p class="text-justify">Делегирование (англ. Delegation) основной шаблон проектирования, в котором объект
        внешне выражает некоторое поведение, но в реальности передает ответственность за выполнение этого поведения
        связанному объекту. Шаблон делегирования является фундаментальной абстракцией, на основе которой реализованы
        другие шаблоны - композиция (также называется агрегацией), примеси (mixins) и аспекты (aspects).<br>
        <a href="https://ru.wikipedia.org/wiki/Шаблон_делегирования">https://ru.wikipedia.org/wiki/Шаблон_делегирования</a><br>
        <a href="https://www.youtube.com/watch?v=uxbmNi6XPxE&list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v">Пояснение Дмитрия Афанасьева</a>
        </p>
    </p>
</div>
DSC;
    }


    /**
     * @return string
     */
    public static function getFaq() {
        return <<<'FAQ'
<div class="card-header">
    <div class="text-center">
        <h5>FAQ</h5>
    </div>
</div>
<div class="card-body">
    <p class="card-text">
        Было бы здорово:<br>
        1)  если бы для каждого паттерна была бы некая вторая часть или уже в самом конце после обзора всех паттернов
        ты бы рассмотрел паттерны в ключе "когда какой применять" и на пример там бы ты объяснил, что допустим стратегия
        и цепочка они как бы напрашиваются оба но они разные по сути и что стратегия - это когда у тебя есть общий
        интерфейс для того что бы на его основе реализовать различные алгоритмы у которых есть некие общие зависимости
        и они решают схожие задачи, а цепочка - это когда есть цепочка объектов которая идет от более детального ответа
        к более общему и что каждый дает некий ответ, но его уровень детализации различен, то есть некие сравнения
        одного паттерна против другого что бы было чёткое понимание почему использовать этот а не другой. А если бы ты
        еще к этому и примеры добавил и показал что в этом ИФ-ЕЛСЕ напрашивается стратегия потому что смотрите тут
        видны алгоритмы разные для решения задачи, а вот в таком IF-ELSE c кучей вложенностей можно было бы применить и
        цепочку или наоборот не применять цепочку а применить вообще третий паттерн ...<br>
        Уверен что ты уловил мысль которую я хотел донести :)<br>
        2) и второй, еще более важный момент было бы здорово если бы ты приводил пример из реальной жизни, а не на
        животных и геометрических фигурах. Например в данном уроке ты детально объяснил паттерн на хорошем примере
        отправке оповещения - это хороший пример из реальной жизни и было бы идеально если бы ты на словах в конце
        добавил еще 2-3 примера  из реальной жизни где бы этот паттерн вписался, на пример сказал: так же этот паттерн
        подошел бы для реализации такой задачи и такой задачи или вот такой и тогда у просматривающего урок появилась
        бы целостная картинка в голове когда на нескольких различных примерах/ситуациях в голове отложилась бы некая
        аналогия и тогда, когда он в жизни столкнется с четвертым случаем он сразу поймет какой паттерн использовать
        потому что этот четвертый новый случай идеально присоеденится к тем 2-3 случаям аналогия которых у него в
        голове уже есть. Для тебя это будет больше работы но за то какой же офигенный курс по паттернам ты бы создал...
        Он был бы очень полезен в практике (а не только как теория) , его можно было бы пересматривать снова и снова
        откладывая в голове и конкретную реализацию и некии другие аналогии для запоминания ...<br>
        <br>
        У нас есть вспомогательные мессенджеры: EmailMessenger и SmsMessenger. AppMessenger делегирует все поведение в
        эти классы. Все поведение туда ушло, но это не обязательно, это частный случай. У нас может часть поведения
        уйти в один класс, а часть поведения уйти в другой класс. Также как объект Request в Laravel, внутри него
        валидацию делает другой класс, т.е. он делегирует работу своему работнику<br>
    </p>
</div>
FAQ;
    }


    /**
     * @return $this
     */
    public function toEmail(){
        $this->messenger = new EmailMessenger();

        return $this;
    }

    /**
     * @return $this
     */
    public function toSms(){
        $this->messenger = new SmsMessenger();

        return $this;
    }

    /**
     * @param string $value
     *
     * @return MessengerInterface
     */
    public function setSender($value): MessengerInterface
    {
        $this->messenger->setSender($value);

        return $this->messenger;
    }

    /**
     * @param string $value
     *
     * @return MessengerInterface
     */
    public function setRecipient($value): MessengerInterface
    {
        $this->messenger->setRecipient($value);

        return $this->messenger;
    }

    /**
     * @param string $value
     *
     * @return MessengerInterface
     */
    public function setMessage($value): MessengerInterface
    {
        $this->messenger->setMessage($value);

        return $this->messenger;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        return $this->messenger->send();
    }

}
