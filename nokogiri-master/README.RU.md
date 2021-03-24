![PHP Composer](https://github.com/olamedia/nokogiri/workflows/PHP%20Composer/badge.svg?branch=master)

> Внимание: Новая версия может ломать совместимость, в этом случае используйте предыдующую версию в ветке или теге v1.0 с поддержкой php 5.4+

> Класс \nokogiri оставлен для совместимости

[In English](README.md) [На русском](README.RU.md)

Парсер HTML
===========
Данная библиотека - это быстрый парсер html кода, который способен работать с невалидным кодом.<br />
Под капотом используется библиотека LibXML.<br />
На вход необходимо подавать документ в кодировке UTF-8 или DomDocument.<br />
Для поиска элементов используются css-селекторы, которые преобразуются внутри в xpath выражение.<br />

Использование
===================================
### Загрузка HTML
> Ошибки html игнорируются
* Из строки `$saw = new \nokogiri($html);` `$saw = \nokogiri::fromHtml($html);`
* Из DOM элементов `$saw = new \nokogiri($dom);` `$saw = \nokogiri::fromDom($dom);`

### get($cssSelector)
Где элементы в $cssSelector имеют формат
`tagName[attribute=value]#elementId.className:pseudoSelector(expression)`
```php
$saw->get('div > a[rel=bookmark]')->toArray();
```
### toArray()
Возвращает структуру в виде массива.<br />
Значениями являются аттрибуты, текст под ключом #text и вложенные элементы под числовыми ключами

### toXml()
Возвращает HTML строку

### getDom() toDom()
Возвращает DOMDocument.
При передаче true первым аргументом - может возвращать также DOMNodeList или DOMElement

### Итерация по найденным элементам
```php
foreach ($saw->get('#sidebar a.topic') as $link){
    var_dump($link['#text']);
}
```

Реализованные селекторы
=========================
* tag
* .class
* \#id
* \[attr\]
* \[attr=value\]
* :root
* :empty
* :first-child
* :last-child
* :first-of-type
* :last-of-type
* :only-of-type
* :nth-child(a)
* :nth-child(an+b)
* :nth-child(even/odd)

Требования
============
* DOM
* libxml >=2.9.0
* PHP >= 7.3

Лицензия
========
MIT

Что нового
==========
### 2.0.0
* Минимальная версия PHP 7.3
* Минимальная версия LibXML 2.9.0
* Полный рефакторинг
* Частично изменено поведение, что может ломать совместимость
* Изменено поведение при загрузке HTML
* Покрытие тестами
* Исправлена работа nth-child и некоторых других селекторов
* Некорректные селекторы теперь выбрасывают исключения
* Добавлены новые селекторы

### 1.0.0
* Первая версия, 2011 год
* Минимальная версия PHP 5.4
