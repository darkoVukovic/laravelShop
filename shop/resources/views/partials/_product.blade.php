
@foreach($productData as $data) 
    <p>Name: {{$data->name}}</p>
    <p>about: {{$data->about}}</p>
    <img src={{$data->imagePath}} alt="product Image" >
@endforeach