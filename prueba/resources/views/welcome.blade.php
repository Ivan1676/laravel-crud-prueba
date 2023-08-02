<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="bg-blue-950 text-blue-100 pt-20">
    <div class="max-w-5xl mx-auto">
        {{-- form to create a tweet --}}
        <div>
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                    Insert new Tweets
                </span>
            </h1>
        </div>
        <div class="max-w-5xl mx-auto py-5">
            <div>
                <form action="/tweets" method="POST">
                    @csrf
                    <input type="text" name="body" class="w-full p-2 border-2 border-blue-500 text-black"
                        placeholder="What's happening?" />
                    <button type="submit"
                        class="relative mt-5 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Tweet
                        </span>
                    </button>
                </form>
            </div>
        </div>
        {{-- tweets --}}
        <div class="mt-10 mb-10">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                    List of tweets here
                </span>
            </h1>
        </div>

        <style>
            .tweet-form input[type="text"] {
                width: 100%;
                clear: both;
                margin-bottom: 2em;
            }

            #edit-tweet {
                margin-top: 20px;
            }

            #delete-tweet {
                margin-top: 20px;
            }

            /* Add float property to the buttons */
            .button-container button {
                float: left;
            }
        </style>

        <div>
            @foreach ($tweets as $tweet)
                <div class="border-b-2 border-blue-500 p-2">
                    {{-- update button --}}
                    <form action="/tweets/{{ $tweet->id }}" method="POST" class="tweet-form">
                        @csrf
                        @method('PUT')
                        <input type="text" name="body" value="{{ $tweet->body }}"
                            class="w-full p-2 border-2 border-blue-500 text-black" />
                        <div class="button-container">
                            <button type="submit" id="edit-tweet"
                                class="relative w-40 inline-flex items-center justify-center p-0.5 mb-10 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                <span
                                    class="relative w-40 px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Edit
                                </span>
                            </button>
                        </div>
                    </form>

                    {{-- delete button --}}
                    <form action="/tweets/{{ $tweet->id }}" method="POST" class="tweet-form">
                        @csrf
                        @method('DELETE')
                        <div class="button-container">
                            <button type="submit" id="delete-tweet"
                                class="relative w-40 inline-flex items-center justify-center p-0.5 mb-10 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                <span
                                    class="relative w-40 px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Delete
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
