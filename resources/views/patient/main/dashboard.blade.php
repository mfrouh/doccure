@extends('layout.patient')
@section('pcontent')

@foreach (auth()->user()->notifications as $notification)
     <?php echo $notification->data['content']; ?><br>
@endforeach
@endsection
