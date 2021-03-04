<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег table</title>
  <style> 
      
   table {
    width: 100%; /* Ширина таблицы */
    background: white; /* Цвет фона таблицы */
    color: white; /* Цвет текста */
    border-spacing: 1px; /* Расстояние между ячейками */
   }
   td, th {
    background: graytext; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
   }
   @media screen and (max-width: 600px) {
	table.table-2 tr{
		display: block;
	}
	table.table-2 tr{
		margin-bottom: 30px;
	}
	table.table-2 th, table.table-2 td{
		display: block;
		text-align: center;
	}
}

  </style>
 </head> 
 <body>
     <table class="table-2">
      <link href="https://fonts.google.com/share?selection.family=Open%20Sans:wght@300"rel="stylesheet">
      <tr><th>Colomn 1</th><th width="250">Colomn 2</th><th width="250">Colomn 3</th></tr>
  </table>
 </body>
</html>
