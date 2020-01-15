<?php


namespace App\DesignPatterns\Fundamental\PropertyContainer;


use App\DesignPatterns\Fundamental\PropertyContainer\Interfaces\PropertyContainerInterface;
use Exception;

/**
 * Class PropertyContainer
 *
 * @package App\DesignPatterns\Fundamental\PropertyContainer
 *
 * @url https://ru.wikipedia.org/wiki/Контейнер_свойств_(шаблон_проектирования)
 *
 * @url http://design-pattern.local/fundamentals/property-container
 */
class PropertyContainer implements PropertyContainerInterface
{
    /**
     * @var array
     */
    private $propertyContainer = [];

    /**
     * @return string
     */
    public static function getDescription()
    {
        return <<<'DSC'
<div class="card-header">
    <div class="text-justify"><em>App\Http\Controllers\FundamentalPatternsController@PropertyContainer</em></div>
</div>

<div class="card-body">
    <p class="card-text">
        <p class="text-justify">Контейнер свойств (англ. property container) - фундаментальный шаблон проектирования,
            который служит для обеспечения возможности уже построенного и развернутого прирложения
            динамически расширять свои свойства, а в общем случае, функциональность.
        </p>

        <p class="text-justify">Это достигается путем добавления дополнительных свойств непосредственно самому объекту
            в некоторый контейнер свойств, вместо расширения класса объекта новыми свойствами.<br>
        <a href="https://ru.wikipedia.org/wiki/Контейнер_свойств_(шаблон_проектирования)">https://ru.wikipedia.org/wiki/Контейнер_свойств_(шаблон_проектирования)</a><br>
        <a href="https://www.youtube.com/watch?v=uVWPusUe3Aw&list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v">Пояснение Дмитрия Афанасьева</a>
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
        <p>Один из способов внедрения в наш уже существующий класс BlogPost это наследование. Пример сурогатный, скорее всего в
        рабочем проекте BlogPost уже от кого-то будет наследоваться от какого-то абстрактного класса, либо не абстрактного,
        не важно. Можно сделать как инъекцию зависимости. Трейтом тоже можно.</p>

        <p>Спасибо! Хоть я и не знал, как называется паттерн, но как-то бессознательно им пользовался. Иногда на
        самом деле не знаешь, какие свойства в будущем пригодятся. Тогда я просто заводил массив,типа
        protected $additionalProperties = []; и по мере нужды туда что-то добавлялось</p>

        <p>Вопрос: А есть возможность (или альтернатива) внедрения такого шаблона без изменения существующего класса?
        Не часто, но бывает в практике класс уже покрыт тестами или запакован (как либа или пхар) и внутри него творится
        непонятно что... (в плоть до реализации сеттеров и геттеров через магические методы... это боль и трейты не помогут...)...
        Или в таком случае без очередного контейнера никак не обойтись?<br>
        Ответ (Дмитрий Афанасьев): Как вариант можно попробовать ШП Фасад. При его использовании сам класс не затронется...
        Но затронется остальное приложение - придется заменить использование изначального класса на новый. Либо как в видео
        написать класс реализующий контейнер свойств и трейт к нему  дабы внедрить в текущий класс. В данном случае получим
        лишь добавление трейта... и единственная опасность - совпадение методов по имени.</p>

        <p>Вопрос: а есть рабочие способы поиска где такие свойства задаются? ни кто же не мешает задать такое свойство в
        представлениях или еще где то, а потом переопределить еще в каком то неожиданном месте, и не получается быстро найти
        где это происходит<br>
        Ответ(Д.А.): Описанная проблема не является исключительно особенной проблемой подхода показанного в шаблоне....
        К сожалению...</p>

        <p>Вопрос: Зачем создавать лишний класс, если в php и так свойства динамические?<br>
        Ответ: Но в других языках свойства могут и не быть динамическими.<br>
        1) Так что эта реализация будет работать независимо от используемого языка программирования.<br>
        2) Также следует учитывать, что это фундаментальный шаблон проектирования. Следовательно, он в том или ином виде может
        использоваться и в других шаблонах. И привязка к фичам языка может помешать их реализации (это спорный аргумент, я лишь
        делаю предположение).</p>

        <p>Вопрос: А можем мы считать примером реализации контейнера свойств реализацию в Eloquent доступа к свойствам модели
        через магические методы? Так понимаю там по сути то же самое происходит, только методы доступа к контейнеру в магических
        методах вызываются.</p>
    </p>
</div>
FAQ;
    }

    /**
     * @inheritDoc
     */
    public function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @inheritDoc
     */
    public function deleteProperty($propertyName)
    {
        unset($this->propertyContainer[$propertyName]);
    }

    /**
     * @inheritDoc
     */
    public function getProperty($propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function updateProperty($propertyName, $value)
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new Exception("Property [$propertyName] not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

}
