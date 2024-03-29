<script>
    $(document).ready(function(){
//Задание текстов описания ошибок
        jQuery.validator.messages.required = "Это поле обязательно для заполнения";
        jQuery.validator.messages.email = "Некорректный e-mail";
        jQuery.validator.messages.minlength = "Недостаточное количество символов в поле";
        jQuery.validator.messages.maxlength = "Превышено количество символов в поле";
        jQuery.validator.messages.phone = "Синтаксически неверный номер телефона";
        jQuery.validator.messages.symbols = "Введены запрещенные символы";
//Метод проверки телефона
//         jQuery.validator.addMethod("phone", function(phone_number, element) {
//             phone_number = phone_number.replace(/\s+/g, "");
//             return this.optional(element) || !SimpleCheckOnExist(' +()-0123456789', phone_number);
//         }, "Некорректный номер телефона.");
//Метод проверки HTML Тегов
        jQuery.validator.addMethod("symbols", function(text, element) {
            text = text.replace(/\s+/g, "");
            return this.optional(element) || !text.match(/(\<|\>)/);
        }, jQuery.validator.messages.symbols+" HTML разметки: < и/или >");


        let tel = $("#tel").val().trim();

        function telephoneCheck(str) {
            var regex = /^(1\s?)?(\(\d{3}\)|\d{3})[\s\-]?\d{3}[\s\-]?\d{4}$/;
            return regex.test(str);
        }

        if (!telephoneCheck(tel)){
            return false
        }
        jQuery.validator.addMethod("phone", function (phone_number){
            phone_number = phone_number.replace(/\s+/g, "");
            return telephoneCheck(phone_number);
        }, "Некорректный номер телефона.");
//Функция проверки наличия недопустимых символов
        function SimpleCheckOnExist(checkStop, checkStr)
        {
            var check = false;
            var i = 0;
            var j = 0;
            for (i = 0; i < checkStr.length; i++)
            {
                simbol = checkStr.charAt(i);
                for (j = 0; j < checkStop.length; j++)
                {
                    if (simbol == checkStop.charAt(j))
                    { check = true; break; }
                }
                if (check == false)
                { return(true); break; }
                check = false;
            }
        }
//Вывод сообщения при успешной отправке
        $.validator.setDefaults({
            submitHandler: function() {
                alert("submitted!");
            }
        });
//Задание на проверку полей формы
        $().ready(function() {
// validate the comment form when it is submitted
            $("#ContactForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        minlength: 3,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 7,
                        maxlength: 36,
                        phone: true
                    },
                    service: {
                        required: true,
//required: "#face:checked",
                        minlength: 2
                    },
                    "comment": {
                        required: false,
                        minlength: 5,
                        maxlength: 2000,
                        symbols: true
                    }
                },
                messages: {
                    name: {
                        required: "Введите название",
                        minlength: "Введите не менее 3-х символов"
                    },
                    email: "Введите верный email адрес",
                    service: "Выберите не менее 2-х опций"
                }
            });
        });
    });
</script>
<style>
    #ask_yurist {
        min-width: 330px;
        min-height: 300px;
        background-color: #464544;
        border-radius: 20px;
        color: #fff;
    }
    #ask_yurist .title {

    }
    #ask_yurist .title h3 {
        font-size: 22px;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    #ask_yurist .body {

    }
    #ask_yurist form {

    }
    #ask_yurist fieldset {
        padding: 10px;
        display: inline-block;
        width: 47%;
        min-height: 250px;
        color: #fff;
        font-weight: normal;
        vertical-align: top;
        min-width: 270px;
    }
    #ask_yurist fieldset.face,
    #ask_yurist fieldset.comments {
    }
    #ask_yurist legend {
        border:none;
        padding:0 10px 0 10px;
        width:auto;
    }
    #ask_yurist label,
    #ask_yurist fieldset.face label span,
    #ask_yurist fieldset.services label span {
        overflow: hidden;
        display: inline-block;
        margin-right: 10px;
        color: #fff;
        font-weight: normal;
        font-size: 18px;
    }
    #ask_yurist fieldset.face label span,
    #ask_yurist fieldset.services label span {
        width: 150px;
        display: inline-flex;
    }
        #ask_yurist input [type="text"],
        #ask_yurist input [type="mail"],
    #ask_yurist div.b_send {
        }
    #ask_yurist input[type="Submit"] {
        padding:10px 30px 12px 30px;
        font-size:22px;
        border-radius:10px;
        border:none;
        background-color:#000;
        color:#fff;
    }
    #ask_yurist input[type="Submit"]:hover {
        color: #000;
    }
    @media (max-width: 980px) {
        #ask_yurist fieldset,
        #ask_yurist fieldset.face,
        #ask_yurist fieldset.comments {
            float: none;
        }

        #ContactForm label.error {
            margin: 0;
            width: auto;
            display: none;
            width: 100%;
            text-align: right;
            background: #fff;
            color: #ff0000;
            padding: 5px;
        }

        #ContactForm input.error {
            border: 1px dotted red
        }

        #newsletter_topics label.error {
            display: none;
            margin-left: 103px;
        }
    }
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вопрос Юристу</title>
</head>
<body>
<div id="ask_yurist">
    <div class="title">
        <h3>Вопрос юристу</h3>
    </div>
    <div class="body">
        <form id="ContactForm" name="ContactForm" method="post" action="">
            <fieldset class="contacts">
                <legend>Контакты</legend>
                <p>
                    <label for="name">Имя <em>*</em></label><input type="text" id="name" name="name"  required>
                </p>
                <p>
                    <label for="email">E-mail <em>*</em></label><input type="email" id="email" name="email" required>
                </p>
                <p>
                    <label for="phone">Телефон <em>*</em></label><input type="text" id="phone" name="phone" pattern="+[0-9]([0-9]{3})[0-9]{2}.[0-9]{2}.[0-9]{2}" required>
                </p>
            </fieldset>
            <fieldset class="face">
                <legend>Лицо</legend>
                <p>
                    <label><span>Юридическое</span><input type="radio" id="face" value="1" name="face" required></label>
                </p>
                <p>
                    <label><span>Физическое</span><input type="radio" id="face" value="2" name="face"></label>
                </p>
                <p>
                    <label><span>ИП</span><input type="radio" id="face" value="3" name="face"></label>
                </p>
                <label for="face" class="error"></label>
            </fieldset>
            <fieldset class="services">
                <legend>Услуги</legend>
                <p>
                    <label><span>Гражданские</span><input type="checkbox" class="checkbox" id="service1" value="1"
                                                          name="service"></label>
                </p>
                <p>
                    <label><span>Арбитражные</span><input type="checkbox" class="checkbox" id="service2" value="2"
                                                          name="service"></label>
                </p>
                <p>
                    <label><span>Уголовные</span><input type="checkbox" class="checkbox" id="service3" value="3"
                                                        name="service"></label>
                </p>
                <label for="service" class="error"></label>
            </fieldset> <fieldset class="comments"><legend>Комментарий</legend>
            <p>
                <textarea id="comment" name="comment" style="width:95%" rows="8"></textarea>
            </p>
        </fieldset>
            <div class="b_send">
                <input type="submit" name="Submit" value="Отправить">
            </div>
        </form>
    </div>
</div>
</body>
</html>
