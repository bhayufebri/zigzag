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
            <th >Invoice</th>
            <th >Name</th>
            <th >Event</th>
            <th >Quantity</th>
            <th >Total</th>
            <th >Payment Method</th>
            <th>Status</th>
            <th>Created</th>
           
            
        </tr>
    </thead>
    <tbody>
       <!-- {{$data}} -->
    @foreach($data as $item)
        
        <tr> 
            
            <td >{{ $item->id }}</td>
            <td >{{ $item->invoice_no ? $item->invoice_no : $item->invoice_number }}</td>
            <td >{{ $item->user->first_name }}</td>
            <td >{{ $item->event->name }}</td>
            
            <td >
            
                        @foreach($item->invoice_detail as $items) 
                        {{  $items['jml']}}
                        
                           
                        @endforeach
            </td>
            <td >{{ $item->total }}</td>
            <td >{{ $item->payment_method ? $item->payment_method->name : '-' }}</td>
            <td >{{ $item->status }}</td>
            <td >{{ $item->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>



