<div class={{$page}}>
@foreach($brands as $brand)
       @php 
       $urlBrandName = str_replace(' ', '-', $brand->name);
       @endphp
       <a href="{{url('brand/')}}<?= $urlBrandName?>">
        <div>
        {{$brand->name}}
         </div>
    </a>
    @endforeach
</div>
