<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/js/app.js')

        
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           
             
        <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
            <div class="py-3 px-6 border-b border-gray-300"> Task Submission</div>
              <div class="p-6">
                 <h5 class="text-gray-900 text-xl font-medium mb-2"> </h5>
                    <p class="text-gray-700 text-base mb-4">
                        Here You can see the task which was Assigned to me. 
                    </p>
                    <ul class="list-disc">
                            <li><a href="">Laravel 9</a></li>
                            <li><a href="">Tailwind 3</a></li>
                         </ul>
                        <h3>Please Register & Login to check the authentication & Todo List.</h3>  
                    </div>

                    @if (Route::has('login'))
                    <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                        @auth
                        <a href="{{ url('/todos') }}" >
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Todos
                            </button> 
                        </a>
                        
                         @else
                        <a href="{{ route('login') }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Login
                            </button>
                        </a> 

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Register
                            </button>
                        </a>  
                        @endif
                    @endauth
                
                    </div>
                @endif
               
            </div>
        </div>

        </div>     
        
        
       
            

   
        
        </body>
</html>
