@extends('layout')

@section('content')

   <!-- {{ $data->ID }} <br>
    {{ $data->product_description }} -->
   <p></p> 
<form action="<?=_WEB_PATH."test/upload"?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>
   
   
@endsection
