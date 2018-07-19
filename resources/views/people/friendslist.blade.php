@extends('layouts.app')
@section('content')

    @if(!empty($people_info))
            <table class="table table-striped">
                 @foreach($people_info as $person)
                <tr>
                    <td>
                        {{ $person['name'] }}
                    </td>
                    <td>
                        {{ $person['count'] }}回
                    </td>
                    <td>@foreach($person['restaurants'] as $restaurant)
                            {{ $restaurant }}
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </table>
        
    
    @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">同行者の履歴がありません！</h4>
                <hr>
                <p><a href="{{route('posts.create')}}">記録をつける</a>と誰とどこに、何回食事をしたことがあるかを見ることができます</p>
            </div>
        </div>
    @endif
@endsection