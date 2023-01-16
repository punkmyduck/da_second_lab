# Отчет о лабораторной работе №3
### По курсу: Основы Программирования
### Работу выполнил: студент группы №3131 Глуаков М.А.
## Цель работы:
Разработать и реализовать клиент-серверную информационную систему, реализующую механизм CRUD.
## Ход работы:
### Пользовательский интерфейс:
Пример:

![main](https://user-images.githubusercontent.com/122292517/212752013-29b35a5d-c2b0-4997-a703-c5eef8b1ca51.jpg)

Пример заметки без комментариев:

![comm](https://user-images.githubusercontent.com/122292517/212752030-0bf940cb-501e-4691-bef9-5a7b16d2be51.jpg)

### Пользовательский сценарий:

Пользователь записывает название и текст заметки, после чего нажимает кнопку отправить. Заметка отображается всем пользователям, кнопка **+** позволяет поставить "лайк" записи,
кнопка **-** - "дизлайк". Любой пользователь может оставить комментарий под любой заметкой, возле комментария, как и возле заметки, будет отображаться дата и время публикации.

### API сервера