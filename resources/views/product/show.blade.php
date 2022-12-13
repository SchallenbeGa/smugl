<x-app-layout>

    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Products</h2>
        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 xl:gap-x-8">
            <!-- foreach !-->
            <div class="flex p-6 font-mono">
                <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
                    <img src="/retro-shoe.jpg" alt="" class="absolute z-10 inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
                </div>

                <form class="flex-auto pl-6">
                    <div class="relative flex flex-wrap items-baseline pb-6 before:bg-black before:absolute before:-top-6 before:bottom-0 before:-left-60 before:-right-6">
                        <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
                            xxx
                        </h1>
                        <div class="relative text-lg text-white">
                            $xxx
                        </div>
                        <div class="relative uppercase text-teal-400 ml-3">
                            In stock
                        </div>
                    </div>
                    <div class="flex items-baseline my-6">
                        <div class="space-x-3 flex text-sm font-medium">
                            <label>
                                <input class="sr-only peer" name="size" type="radio" value="xs" checked />
                                <div class="relative w-10 h-10 flex items-center justify-center text-black peer-checked:bg-black peer-checked:text-white before:absolute before:z-[-1] before:top-0.5 before:left-0.5 before:w-full before:h-full peer-checked:before:bg-teal-400">
                                    XS
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="size" type="radio" value="s" />
                                <div class="relative w-10 h-10 flex items-center justify-center text-black peer-checked:bg-black peer-checked:text-white before:absolute before:z-[-1] before:top-0.5 before:left-0.5 before:w-full before:h-full peer-checked:before:bg-teal-400">
                                    S
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="size" type="radio" value="m" />
                                <div class="relative w-10 h-10 flex items-center justify-center text-black peer-checked:bg-black peer-checked:text-white before:absolute before:z-[-1] before:top-0.5 before:left-0.5 before:w-full before:h-full peer-checked:before:bg-teal-400">
                                    M
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="size" type="radio" value="l" />
                                <div class="relative w-10 h-10 flex items-center justify-center text-black peer-checked:bg-black peer-checked:text-white before:absolute before:z-[-1] before:top-0.5 before:left-0.5 before:w-full before:h-full peer-checked:before:bg-teal-400">
                                    L
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="size" type="radio" value="xl" />
                                <div class="relative w-10 h-10 flex items-center justify-center text-black peer-checked:bg-black peer-checked:text-white before:absolute before:z-[-1] before:top-0.5 before:left-0.5 before:w-full before:h-full peer-checked:before:bg-teal-400">
                                    XL
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="flex space-x-2 mb-4 text-sm font-medium">
                        <div class="flex space-x-4">
                            <button class="px-6 h-12 uppercase font-semibold tracking-wider border-2 border-black bg-teal-400 text-black" type="submit">
                                Buy now
                            </button>
                        </div>  
                    </div>
                    <p class="text-xs leading-6 text-slate-500">
                        Free shipping on all mondial orders.
                    </p>
                </form>
            </div>
            <!-- More products... -->
        </div>
    </div>
    </div>
</x-app-layout>