<x-guest-layout>
<style type="text/css">
		#notes{
			width: 100%;
			height: 20px;
			position: relative;
			margin-bottom: 10px;
		}
		.Note {
			width: 20%;
			height: 100%;
			position: relative;
			float: left;
			background-color: black;
			opacity: 0;
			transition: opacity 0.5s;
		}
		.Note.active {
			opacity: 1;
			transition-duration: 0.1s;
		}
	</style>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        
        <p> Be sure you are on {{ URL::current() }} </p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div id="notes">
			@foreach($res as $x)
			<div id="{{ $x }}" class="Note"></div>
			@endforeach
		</div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button id="play-button" class="ml-3">
                {{ __('Play') }}
            </x-primary-button>
        </div>
        
    </x-auth-card>
    <script>

    </script>
</x-guest-layout>