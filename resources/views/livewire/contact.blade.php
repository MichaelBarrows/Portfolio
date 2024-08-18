

<div class="max-w-[95%] md:max-w-7xl mx-auto mb-5 mb-8">
<h2 id="contact" class="text-3xl text-gradient text-center font-semibold text-pacific-blue-600">Get In Touch</h2>
    <form class="pt-3" wire:submit="save">
        {{$this->form}}
        <div class="grid md:grid-cols-2 gap-5 mt-6">
            <input
                type="reset"
                class="w-full bg-red-600 text-white rounded-md p-2 font-semibold shadow-lg"
                value="Reset"
            />
            <input
                type="submit"
                class="w-full bg-emerald-500 text-white rounded-md p-2 font-semibold shadow-lg"
                value="Send"
            />
        </div>
    </form>
</div>
