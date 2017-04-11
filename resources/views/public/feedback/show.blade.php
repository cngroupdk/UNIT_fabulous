@extends('public.presentation.layout')

@section('content')


    <div class="container" data-speed=".3" data-parallax="scroll">
        <h1>{{trans('feedback.title')}}</h1>
        <table class="table table-hover">
            <thead>
            <th>{{trans('feedback.email')}}</th>
            <th>{{trans('feedback.text')}}</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            </thead>
            <tbody>
            <tr>
                <td>jozko@mrkvicka.com</td>
                <td>...</td>
                <td>:D</td>
                <td>:/</td>
                <td>:(</td>
                <td>:)</td>
            </tr>
            <tr>
                <td>jozko@mrkvicka.com</td>
                <td>...</td>
                <td>:D</td>
                <td>:/</td>
                <td>:(</td>
                <td>:)</td>
            </tr>
            <tr>
                <td>jozko@mrkvicka.com</td>
                <td>...</td>
                <td>:D</td>
                <td>:/</td>
                <td>:(</td>
                <td>:)</td>
            </tr>
            <tr>
                <td>jozko@mrkvicka.com</td>
                <td>...</td>
                <td>:D</td>
                <td>:/</td>
                <td>:(</td>
                <td>:)</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection