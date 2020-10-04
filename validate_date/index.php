<?php

function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}
print inverteData($_POST['data']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="datepicker/jquery-ui.css" />
    <!--<style>
        /* datepicker css */

        .ui-datepicker {
            text-align: center;
        }

        .ui-datepicker-trigger {
            margin: 0 0 0 5px;
            vertical-align: text-top;
        }

        .ui-datepicker {
            font-family: Open Sans, Arial, sans-serif;
            margin-top: 2px;
            padding: 0 !important;
            border-color: #c9f0f5 !important;
        }

        .ui-datepicker {
            width: 256px;
        }

        .openemr-calendar .ui-datepicker {
            width: 191px;
        }

        .ui-datepicker table {
            width: 256px;
            table-layout: fixed;
        }

        .openemr-calendar .ui-datepicker table {
            width: 191px;
            table-layout: fixed;
        }

        .ui-datepicker-header {
            background-color: #3e9aba !important;
            background-image: none !important;
            border-radius: 0;
        }

        .openemr-calendar .ui-datepicker-header {
            background-color: #e6f7f9 !important;
            border-width: 1px;
            border-color: #c9f0f5;
            border-style: solid;
        }

        .ui-datepicker-title {
            line-height: 35px !important;
            margin: 0 10px !important;
        }

        .openemr-calendar .ui-datepicker-title {
            line-height: 20px !important;
        }

        .ui-datepicker-prev span {
            display: none !important;
        }

        .ui-datepicker-next {
            text-align: center;
        }

        .ui-datepicker-next span {
            display: none !important;
        }

        .ui-datepicker-prev {
            background-color: transparent !important;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAMCAYAAACulacQAAAAUklEQVQYlXWPwQnAMAwDj9IBOlpH8CjdJLNksuujFIJjC/w6WUioFBcqJ7sGEAD5Y/hpqLRghRv4YQlUjqXI3Kql2MixraGbEhVcDXcFUR/1egEHNuTBpFW0NgAAAABJRU5ErkJggg==') !important;
            height: 12px !important;
            width: 7px !important;
            margin: 14px 12px;
            display: inline-block;
            left: 0 !important;
            top: 0 !important;
        }

        .openemr-calendar .ui-datepicker-prev {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAOCAYAAAD9lDaoAAAAuUlEQVQokXXRsUtCYRAA8J8pDQ1CVIgIgtBU2NDiZIuDS4uLf6WDS1O0tLREEE8icBNKS3lTs8/B78XHw3dwcHA/juOuqjzucYJVrQQMcYctvo4OgEFIeMK6iPphCjzjEWLUC3vACx7yRo5uMUIFr5gii1EL41AvMIkBVPGH04DrSLEsIvjEOZq4wi9+iijDR0ANXOMbmxjlcIY2LtANO6YxymGCDs5wg/ciYv+KBJeY4+2A+Y9j4Y47RtUkrNXeDxUAAAAASUVORK5CYII=') !important;
            height: 14px !important;
            width: 9px !important;
            margin: 5px !important;
        }

        .ui-datepicker-next {
            cursor: pointer;
        }

        .ui-datepicker-prev {
            cursor: pointer;
        }

        .ui-datepicker-next {
            background-color: transparent !important;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAMCAYAAABfnvydAAAAVUlEQVQYlXWQ0Q3AIAhEL07gKI7kKN2kI3Wk1w9to3KQEELucQEECOizhhTQGHFnwOdgobWx0GkZILfYBhXl0STVbPoBarbkL7ozN/F8VBBXh8uJgF5r2hrI4GHUkAAAAABJRU5ErkJggg==') !important;
            height: 12px !important;
            width: 8px !important;
            margin: 14px 12px;
            display: inline-block;
            right: 0 !important;
            top: 0 !important;
        }

        .openemr-calendar .ui-datepicker-next {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAOCAYAAAASVl2WAAAAtElEQVQYlXXQsUpCcRQH4I97EQyHa1pgIEE0hBGYL+BjNLRFjxXh4rM4F21BS4S4FAgqQioOngt/RM/6+zi/w4EanlA4MDkecYsO3vG/D8a4Rx03eMMqBQt8oodTXAdalwBm+IpNDVxG3aYEMMU3ujjDBT5SAH9R2cE58mwPFOgneJSCGp7RjLoXTEtQjbCFOV7xCxkqdp9sYxnhpFyb4QFXdh8c4Cc9Ko++OwzjFwfn5FiwBVeuI/K2UCkSAAAAAElFTkSuQmCC') !important;
            height: 14px !important;
            width: 8px !important;
            margin: 5px;
        }

        .ui-datepicker-month {
            border-radius: 2px;
            background-color: #3985a0;
            width: 110px !important;
            height: 22px;
            font-family: Open Sans !important;
            color: #fff;
            font-size: 14px !important;
            font-weight: 600;
            text-align: left;
            border: none !important;
            margin-right: 17px !important;
            vertical-align: text-top;
        }

        .openemr-calendar .ui-datepicker-month {
            font-family: Open Sans, Arial, sans-serif;
            color: rgba(34, 34, 34, 0.87);
            font-size: 12px !important;
            font-weight: 700;
            text-align: center;
            transform: scaleX(1.0029)
        }

        .ui-datepicker-year {
            border-radius: 2px;
            background-color: #3985a0;
            width: 61px !important;
            height: 22px;
            border: none !important;
            font-family: Open Sans !important;
            color: #fff;
            font-size: 14px !important;
            font-weight: 600;
            text-align: left;
            vertical-align: text-top;
        }

        .openemr-calendar .ui-datepicker-year {
            font-family: Open Sans, Arial, sans-serif;
            color: rgba(34, 34, 34, 0.87);
            font-size: 12px !important;
            font-weight: 700;
            text-align: center;
            transform: scaleX(1.0029)
        }

        .ui-datepicker-month option,
        .ui-datepicker-year option {
            color: #3985a0 !important;
            background-color: #fff !important;
            font-family: Open Sans !important;
            font-size: 14px !important;
            font-weight: 600;
        }

        .ui-datepicker-month option[selected],
        .ui-datepicker-year option[selected] {
            background-color: #e5edf0 !important;
        }

        .ui-datepicker .ui-state-hover {
            /*background: none !important;*/
            border: 0 !important;
        }

        .ui-datepicker td {
            vertical-align: top;
        }

        .ui-datepicker .ui-state-default {
            border-radius: 2px;
            border-color: #edebeb !important;
            /*     background: white !important; */
            width: 24px;
            height: 24px;
            padding: 0 !important;
            line-height: 24px;
            text-align: center !important;
            font-family: Open Sans, Arial, sans-serif;
            color: #707070;
            font-size: 13px;
            font-weight: 400 !important;
            margin: 7px 0 0 4px;
        }

        .ui-datepicker .ui-state-default.ui-state-highlight{
            border-color: #dcdcdc;
            background-color: #cff3f8 !important;
            color: #3e9aba !important;
        }

        .openemr-calendar .ui-state-default {
            font-size: 10px;
            margin: 0;
        }

        .ui-datepicker td {
            width: 33px;
        }

        .openemr-calendar .ui-datepicker td {
            width: 26px;
        }

        .openemr-calendar .ui-state-default {
            width: 26px;
            height: 20px;
            line-height: 20px;
        }
        .ui-state-default.ui-state-hover {
            border-color: #dcdcdc;
            background-color: #cff3f8 !important;
        }

        .ui-datepicker .ui-state-active {
            border-color: #dcdcdc;
            background-color: #cff3f8 !important;
            color: #3e9aba !important;
        }

        .ui-datepicker-calendar thead tr th {
            font-family: Open Sans, Arial, sans-serif;
            color: #549fa8;
            font-size: 12px;
            font-weight: 400;
            padding: 0.45em 0.3em !important;
            /*   width: 15px !important; */
        }

        .openemr-calendar .ui-datepicker-calendar thead tr th {
            font-size: 10px;
        }

        .ui-datepicker-close {
            display: none;
        }

        .ui-datepicker thead {
            background-color: #f5f5f5;
        }

        .openemr-calendar .ui-datepicker thead {
            background: none;
        }

        .ui-state-default.ui-datepicker-current {
            float: none !important;
            font-family: Open Sans, Arial, sans-serif;
            color: #fff;
            font-size: 14px;
            font-weight: 400;
            text-align: left;
            border-width: 0 !important;
            border: none;
            vertical-align: top;
            margin: 0 !important;
            background-color: transparent !important;
        }

        .ui-datepicker-buttonpane.ui-widget-content {
            text-align: center;
            background-color: #3e9aba;
            margin: 0 !important;
            height: 28px;
            padding: 0 !important;
        }

        .openemr-calendar .ui-datepicker-year {
            background-color: transparent;
        }

        .openemr-calendar .ui-datepicker-month {
            background-color: transparent;
        }

        .openemr-calendar .ui-state-default {
            border: 0 !important;
        }

        .openemr-calendar .ui-datepicker-month {
            margin-right: 10px !important;
        }


    </style>-->

</head>
    <form action="" name="fomr1" method="post">
        <input type="text" id="datanew" value="<?php echo date('d/m/Y')?>" placeholder="DD/MM/YYYY" autocomplete="off" name="data" onblur="validatedate()">
        <input type="submit">
    </form>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>-->
<script src="datepicker/jquery-ui.js"></script>
<script src="jquery.mask.min.js"></script>
<script>
   $('#datanew').mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
    $(function() {
        $( "#datanew" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        });
    });

    function validatedate()
    {
        var input = document.getElementById('datanew').value
        console.log(input)

        /**--------------------------
         //* Validate Date Field script- By JavaScriptKit.com
         //* For this script and 100s more, visit http://www.javascriptkit.com
         //* This notice must stay intact for usage
         ---------------------------**/

        var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
        var returnval=false
        if (!validformat.test(input))
            alert("Formato de data inválido. Por favor, corrija e envie novamente!")
        else{ //Detailed check for valid date ranges
            var dayfield=input.split("/")[0]
            var monthfield=input.split("/")[1]
            var yearfield=input.split("/")[2]
            var dayobj = new Date(yearfield, monthfield-1, dayfield)
            if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
                alert("Detectado intervalo inválido de dia, mês ou ano. Por favor, corrija!")
            else
                returnval=true
        }
        if (returnval==false) input
        return returnval

    }
</script>
</body>
</html>