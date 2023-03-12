

<h4>Order Number: {{$orden->id}}</h4>
<h4>Customer: {{$customer->name}}</h4>


<table>
    <thead>
    <tr>        
        <th>Qty</th>
        <th>Description</th>       

        <th>Scan Item UPC</th>
        <th>Cases per Pallet</th>
        <th>Food Show Deal</th>
        <th>notes</th>

        <th>finalprice</th>
        <th>{{$orden->date1}}</th>
        <th>{{$orden->date2}}</th>
        <th>{{$orden->date3}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            
            <td>{{ $order->amount }}</td>
            <td>{{ $order->name }}</td>            

            <td>{{ $order->upc }}</td>
            <td>{{ $order->pallet }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->notes }}</td>

            <td>{{ $order->finalprice }}</td>
            <td>{{ $order->qtyone }}</td>
            <td>{{ $order->qtytwo }}</td>
            <td>{{ $order->qtythree }}</td>          
            
        </tr>
    @endforeach
    </tbody>
</table>

<h4>Rebate: {{$orden->rebate}}</h4>
<h4>Notes:</h4>
<p>{{$orden->comments}}</p>