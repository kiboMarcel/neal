<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
        }

        body h2 {
            text-align: center;
        }

        .header  {
            text-align: center;
        }

        .header {
            /*  display: flex;
            flex-direction: row;
            justify-content:  space-between;
            align-items: center; */
            margin-bottom: 70px;

        }

        .text {
            float: left;
            width: 40%;
        }

        .logo {
            float: right;
            width: 15%;
        }

        img {
            width: 100px;
        }

      
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .student-data {
            text-align: center;
        }

     

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

    </style>


</head>

<body>

    <div class="header">
        <div>
            <h2 style="" > ETS LE NIL</h2>
          

        </div>

       
    </div>


    <h2>Payement Salaire </h2>
    <table class="styled-table" id="customers">
        <thead>
            <tr>
                <th style="width: 300px"><strong>Detail</strong></th>
                <th style="width: 300px"><strong>Elève</strong></th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    <h4>Nom Prénoms</h4>
                </td>
                <td class="student-data">
                    <strong> {{$employee->name}} </strong>
                </td>
            </tr>
          
            <tr>
                <td>
                    <h4>Sexe</h4>
                </td>
                <td class="student-data">
                    <strong> {{$employee->gender}} </strong>
                </td>
            </tr>
          
            <tr>
                <td>
                    <h4>Année de naissance</h4>
                </td>
                <td class="student-data">
                    <strong>  {{$employee->date_of_birth}} </strong>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>Numéros </h4>
                </td>
                <td class="student-data">
                    <strong>  {{$employee->mobile}} </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Salaire </h4>
                </td>
                <td class="student-data">
                    <strong>  {{$employee->salary}}  </strong>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>Mois du </h4>
                </td>
                <td class="student-data">
                    <strong>  {{$pay_date}} </strong>
                </td>
            </tr>

            <tr>
                <td>
                    <h4>Payé le  </h4>
                </td>
                <td class="student-data">
                    <strong>  </strong>
                </td>
            </tr>
          
         

        </tbody>
    </table>

</body>

</html>
