<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:rgb(190, 196, 190);
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/IIT.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>IIT DU</h2>


    </td> 
  </tr>
  
   
</table>
 <br> <br>
 <strong>Result of : </strong> {{ $allData['0']['exam_type']['name'] }} 
 <br> <br>
<table id="customers">
   
  <tr>    
    <td width="50%"> <h4>Year / Session : </h4> {{ $allData['0']['year']['name'] }} </td>
    <td width="50%"> <h4> Class :  </h4>{{ $allData['0']['student_class']['name'] }} </td>
    <td width="50%"> <h4> Exam Type :  </h4>{{ $allData['0']['exam_type']['name'] }} </td>
    </tr>
    
    <tr>
    <td width="50%">Student Name</td>
    <td width="50%">Marks</td>
  </tr>
  @foreach($allData as $data)
  <tr>
    <td width="50%">{{ $data['student']['name'] }}</td>
     <td width="50%">{{ $data['marks'] }}</td>
  </tr>
  @endforeach
    </tr>
  
   
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
