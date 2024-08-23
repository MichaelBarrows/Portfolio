<div class="max-w-[95%] md:max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 pb-8">
    <h2 id="about" class="text-3xl text-pacific-blue-600 text-center md:col-span-3 font-semibold">About Me</h2>
    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-4 pb-5">
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-3 grid grid-cols-1">
            <div class="aspect-square max-w-[25%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                <div class="relative top-[50%] -translate-y-2/4">
                    <i class="fas fa-graduation-cap block text-3xl p-5 text-white" aria-hidden="true"></i>
                </div>
            </div>
            <p class="md:text-lg pt-3">4 years of Web Development specific education</p>
        </div>
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-2 grid grid-cols-1">
            <div class="aspect-square max-w-[25%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                <div class="relative top-[50%] -translate-y-2/4">
                    <i class="fas fa-building block text-3xl p-5  mx-2 text-white" aria-hidden="true"></i>
                </div>
            </div>
            <p class="md:text-lg pt-3">3 years of commercial experience</p>
        </div>
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-3 grid grid-cols-1">
            <div class="aspect-square max-w-[25%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                <div class="relative top-[50%] -translate-y-2/4">
                    <i class="fas fa-code block text-3xl p-5 text-white" aria-hidden="true"></i>
                </div>
            </div>
            <p class="md:text-lg pt-3">Full-stack, with a back-end focus</p>
        </div>
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-3">
            <div class="grid grid-cols-2">
                <div class="aspect-square max-w-[70%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                    <div class="relative top-[50%] -translate-y-2/4">
                        <i class="fab fa-php block text-3xl p-5 text-white" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="aspect-square max-w-[70%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                    <div class="relative top-[50%] -translate-y-2/4">
                        <i class="fab fa-laravel block text-3xl md:text-4xl p-5 text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <p class="md:text-lg pt-3">Playing with PHP since 2013, Laravel since 2017</p>
        </div>
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-3">
            <div class="grid grid-cols-2">
                <div class="aspect-square max-w-[70%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                    <div class="relative top-[50%] -translate-y-2/4">
                        <i class="fas fa-graduation-cap block text-3xl p-5 text-white" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="aspect-square max-w-[70%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                    <div class="relative top-[50%] -translate-y-2/4">
                        <i class="fas fa-comments block text-3xl p-5 text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <p class="md:text-lg pt-3">Published research around machine learning and natural language processing</p>
        </div>
        <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg text-center p-3 grid grid-cols-1">
            <div class="aspect-square max-w-[25%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                <div class="relative top-[50%] -translate-y-2/4">
                    <i class="fas fa-book block text-3xl md:text-4xl p-5 text-white" aria-hidden="true"></i>
                </div>
            </div>
            <p class="md:text-lg pt-3">Always trying to learn something new</p>
        </div>
    </div>
    <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg p-2 text-center">
        <h3 class="text-pacific-blue-600 text-2xl text-center mb-2 font-semibold">Back-end Skills</h3>
        @foreach($backEndSkills as $skill)
            <x-skill>{{ $skill }}</x-skill>
        @endforeach
    </div>
    <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg p-2 text-center">
        <h3 class="text-pacific-blue-600 text-2xl text-center mb-2 font-semibold">Front-end Skills</h3>
        @foreach($frontEndSkills as $skill)
            <x-skill>{{ $skill }}</x-skill>
        @endforeach
    </div>
    <div class="border-2 border-pacific-blue-600 rounded-md shadow-lg p-2 text-center">
        <h3 class="text-pacific-blue-600 text-2xl text-center mb-2 font-semibold">Other Skills</h3>
        @foreach($otherSkills as $skill)
            <x-skill>{{ $skill }}</x-skill>
        @endforeach
    </div>
</div>
