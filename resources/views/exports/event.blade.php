<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
table {
    border-collapse: collapse; width: 100%;
}
th {
  height: 50px;
}

table, td, th {
  border: 1px solid black;

}
</style>
</head>
<body>
<table style="border-collapse: collapse; width: 100%;" >
    <thead>
        <tr>
            <th  >ID</th>
            <th >Name</th>
            <th >Venue</th>
            <th >Address</th>
            <th >Status</th>
            
           
            
        </tr>
    </thead>
    <tbody>
       <!-- {{$data}} -->
    @foreach($data as $item)
        
        <tr> 
            
            <td >{{ $item->id }}</td>
            <td >{{ $item->name }}</td>
            <td >{{ $item->venue }}</td>
            <td >{{ $item->address }}</td>
            <td >{{ $item->status == '1' ? 'Active' : 'Disabled' }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>



