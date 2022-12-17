@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="lg:w-2/4 text-center text-4xl  mx-auto py-8 px-6 bg-white">
                       <h1 class="font-semibold">Todo List For HelloTask</h1>
                    </div>
                </div>

                <div class="card-body">
                <div class="bg-gray-200 p-4">
                    <div class="mb-6">
                        <form class="flex flex-col space-y-4" method="POST" action="/todos">
                            @csrf
                            <input type="text" name="title" placeholder="Enter Task Title" class="shadow-md rounded py-3 px-4 bg-gray- border-none focus:ring-0"/>
                            <textarea name="description" id="description" placeholder="Something about the Task" class=" py-3 px-4 bg-gray-100 border-none focus:ring-0"></textarea>
                            
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-28 py-2 px-4 rounded">Add</button>

                        </form>
                    </div>

        <hr>
        <div class="mt-2">
            @foreach($todos as $todo)
            <div @class(['py-4 flex items-center border-b border-gray-300 px-3' ,
            $todo->isDone ? 'bg-green-200' : ''
            ])>
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                        <p class="text-gray-500">{{$todo->description}}</p>
                    </div>

                    <div class="flex space-x-3">
                        <form method="post" action="todos/{{$todo->id}}">
                            @csrf
                            @method('patch')
                        <button class="py-2 px-2 bg-green-500 text-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                        </form>


                        <form method="post" action="todos/{{$todo->id}}">
                            @csrf
                            @method('delete')
                        <button class="py-2 px-2 bg-red-500 text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                        </form>

                    </div>

                
            </div>
            @endforeach
            {!! $todos->links() !!}
        </div>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
