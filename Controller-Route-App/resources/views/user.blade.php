@extends('layout.main')
@section('title','User Data') 
@section('page-data')
    <form action="" method="post">
        @csrf
        <table border="2" align="center">
            <tr>
                <th colspan="2">User Data</th>
            </tr>
            <tr>
                <td>User Name</td>
                <td>
                    <input type="text" name="username" id="userID">
                </td>
            </tr>
            <tr>
                <td>User Email</td>
                <td>
                    <input type="email" name="userEmail" id="userEmailID">
                </td>
            </tr>
            <tr>
                <td>Mobile No.</td>
                <td>
                    <input type="tel" name="mobileNo" id="mobileID" pattern="^[0-9]+">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="submit" name="submit">
                </td>   
            </tr>
        </table>
    </form>
@endsection
{{-- overwrite data --}}
{{-- @section('default-contect')
<h2>This is Home page text </h2>
@endsection --}}

{{-- Append Data --}}
@section('default-contect')
@parent
<h2>This is Default text from layout</h2>
@show