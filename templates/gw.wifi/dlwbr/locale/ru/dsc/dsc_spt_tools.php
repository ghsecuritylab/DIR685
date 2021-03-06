﻿<h1>SUPPORT MENU</h1>
<table border=0 cellspacing=0 cellpadding=0 width=750>
<tr>
<td height=2><b><font size=4>Обслуживание</font></b></td>
</tr>
<tr>
<td height=16><p><br>
</td>
</tr>
<tr>
	<td height=20>
		<strong>Управление устройством</strong><a name=12></a><br>
		<p>
			<strong><em>Имя учетной записи администратора</em></strong> -
			Enter the name that will be used to login to the router with Admin access.
		</p>
		<p>
			<strong><em>Пароль администратора</em></strong> -
			Введите и подтвердите пароль, который будут использовать пользователи с учетной запсью <strong>  и привилегией администратора </strong>будут использоваться для доступа к интерфейсу управления маршрутизатора.
		</p>
		<p>
			<strong>Удаленное управление</strong><br>
			Удаленное управление позволяет настраивать устройство через WAN(Wide Area Network)-порт через Интернет, используя Web-браузер.
			Имя пользователя и пароль необходимы для доступа к интерфейсу управления маршрутизатора.<br>
			<strong><em>IP-адрес, доступ с которого разрешен</em></strong> -
			Эта опция позволяет задать определенный IP-адрес, с которого будет разрешен удаленный доступ к маршрутизатору через Интернет.
			По умолчанию это поле не заполнено, что ознаяает, что с любого IP-адреса можно получить  доступ из Интернет для удаленного управления.<br>
			<strong><em>Порт</em></strong> - Выберите порт, который будет использоваться для доступа к <?query("/sys/modelname");?>.
		</p>
		<p>
			<strong><em>Пример: </em></strong><br>
			<a href="http://192.168.0.1/help_tools.html">http://x.x.x.x:8080 </a> x.x.x.x  IP-адрес WAN <?query("/sys/modelname");?>,
			а 8080 -порт, используемый для управления через Web-интерфейс.
		</p>
	</td>
</tr>
<tr><td height=10>&nbsp;</td></tr>
<tr><td height=10>&nbsp;</td></tr>
<tr>
	<td height=40>
		<a name=14><strong>Сохранение и восстановление</strong></a><br>
		Текущие настройки системы могут быть сохранены в виде файла на локальном жестком диске.
		В то же, время существует возможность загрузить файл с ранее сохраненными настройками на устройство.
		Для загрузки конфигурационного файла на коммутатор кликните по кнопке <strong>Поиск</strong> чтобы
		определить на локальном жестком диске файл, который будет использоваться.
		Также можно сбросить устройство к заводским установкам, кликнув по <strong>Восстановление настроек устройства</strong>.
		Воспользуйтесь функцией восстановленияннастроек из конфигурационного файла, если это необходимо.
		Поскольку в результате текущие настройки будут удалены с устройства.
		Перед к сбросом к заводским настройкам убедитесь, что текущие настройки сохранены.<br>
		<strong><em>Сохранить</em></strong> - Кликните по этой кнопке, чтобы сохранить настройки маршрутизатора в виде конфигурационного файла.<br>
		<strong><em>Поиск</em></strong> -
		Кликните по кнопке Поиск и укажите конфигурационный файл, а затем кликните по Загрузка,
		чтобы загрузить сохраненные настройки на маршрутизатор.<br>
		<strong><em>Восстановление устройства</em></strong> -
		Кликните по этой кнопке, чтобы вернуть маршрутизатор к заводским установкам.
	</td>
</tr>
<tr><td height=20>&nbsp;</td></tr>
<tr><td height=20>&nbsp;</td></tr>
<tr>
	<td height=51>
		<b>Обновление программного обеспечения</b><a name=15></a><br> 
		Данная опция позволяет обновить программное обеспечение устройства.
		Убедитесь, что файл с программным обеспечением, которое необходимо установить на маршрутизатор,
		сохранен на локальном жестком диске компьютера. Кликните по кнопке <strong>Поиск </strong>
		чтобы определить на локальном жестком диске файл с программным обеспечением, который будет использоваться.
		Обновление программного обеспечения не меняет настройки системы, но рекомендуется сохранить настройки системы перед обновлением программного обеспечения.
		Пожалуйста, обратитесь на сайт технической поддержки D-Link <a href=<?query("/sys/supporturl");?>></a> 
		для обновления программного обеспечения или кликните по кнопке <strong>Проверить сейчас</strong> чтобы маршрутизатор автоматически проверил,
		появилось ли новое программное обеспечение.
	</td>
</tr>
<tr><td height=20>&nbsp;</td></tr>
<tr><td height=20>&nbsp;</td></tr>
<tr>
	<td height=2>
		<p>
			<strong>Настройка DDNS </strong><a name=16></a><br>
			Dynamic DNS (Domain Name Service) - это доменное имя, за которым скрывается динамический    (изменяющийся) IP-адрес.
			Для всех кабельных и DSL-соединений назначается динамический IP-адрес, и этот адрес будет использоваться только в течение данного соединения.
			С помощью <?query("/sys/modelname");?> можно настроить DDNS-сервис и <?query("/sys/modelname");?> будет автоматически обновлять DDNS-сервер каждый раз при получении нового  IP-адреса WAN.<br>
			<strong><em>Адрес сервера</em></strong> - Выберите своего провайдера DDNS в выпадающем меню.<br>
			<strong><em>Имя Хоста</em></strong> - Введите Имя хоста, под которым зарегистрировались упровайдера DDNS.<br>
			<strong><em>Имя пользователя</em></strong> - Введите имя пользователя учетной записи DDNS.<br>
			<strong><em>Пароль</em></strong> - Введите пароль учетной записи DDNS.
		</p>
	</td>
</tr>
<tr><td height=20>&nbsp;</td></tr>
<tr><td height=20>&nbsp;</td></tr>
<tr>
	<td height="197">
		<p>
			<strong>Проверка системы</strong><a name=17></a><br>
			Это позволяет проверить физическое соединение, как LAN, так и WAN-интерфейсов.
			Это расширенная настройка, которая включает тестирование кабеля LAN для каждого порта Ethernet маршрутизатора.
			благодаря Графическому интерфейсу пользователя (GUI), Кабельный тест позволяет удаленно установить ряд неполадок в кабеле,
			включая обрывы, короткие замыкания, замена, несоответствие сопротивления.
			Эта функция существенно сокращает звонки в сервисную службу и позволяет пользователям легко восстаовить кабельное соединение.
		</p>
		<p>
			<strong>Ping Test</strong><br>
			Полезная диагностическая утилита, позволяющая определить, подключен ли компьютер к Интернет.
			Её действие основано на отправке ping-пакетов на определенные порты и прослушивание ответов.
			Введите Имя или IP-адрес Хоста, который необходимо пропинговать и кликните по <strong>Ping </strong>.
			Статус отправки Ping отображается в окне Результат Ping.
		</p>
	</td>
</tr>
<tr><td height=20>&nbsp;</td></tr>
<tr><td height=20>&nbsp;</td></tr>
<tr>
	<td>
		<p>
			<strong>Расписания<a name=18></a></strong></p>
			Эта страница позволяет настроить глобальные расписания Маршрутизатора.
			После задания параметров этих расписаний позднее они могут применяться для функций, которые поддерживают работу по расписанию.<br>
			<strong><em>Имя</em></strong> - Имя расписания.<br>
			<strong><em>День (дни)</em></strong> -
			 Укажите нужный день, их диапазон или поставьте галочку в поле Вся Неделя, чтобы это расписание применялось каждый день.<br>
			<strong><em>Весь день - 24 часа</em></strong> -
			Поставьте галочку в данном поле, чтобы Расписание было активно все 24 часа заданного дня.<br>
			<strong><em>Время старта</em></strong> -
			Выберите время, начиная с которого будет активироваться заданное Расписание.<br>
			<strong><em>Время окончания</em></strong> -
			Выберите время, начиная с которого будет заданное Расписание станет неактивным.<br>
			<strong><em>Список Правил Расписания</em></strong> -
			Отображает все заданные расписания.
		</p>
	</td>
</tr>
<tr><td height=20>&nbsp;</td></tr>
<tr><td height=20>&nbsp;</td></tr>
<tr>
	<td>
		<p>
			<strong>Настройки системного журнала</strong><strong><a name=19></a></strong><br>
			Существует возможность сохранить файл системного журнала на локальном диске для последующей отправки администратору сети для устранения неисправностей.<br>
			<strong><em>Сохранить</em></strong> - Кликните по этой кнопке для сохранения записей системного журнала в виде текстового файла.<br>
			<strong><em>Тип записей системного журнала</em></strong> - Выберите тип информации, которую необходимо заносить в системный журнал <?query("/sys/modelname");?>
		</p>
	</td>
</tr>

</table>
						   
