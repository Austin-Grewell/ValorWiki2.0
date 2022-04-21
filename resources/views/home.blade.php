<x-layout>

    <x-slot name="intro">
        <div class="home-head text-3xl text-white dark:text-slate-300 font-bold underline justify-center text-center bg-red-700 w-full mx-auto pt-6 pb-10">
            <h1 class="p-6">Welcome to the Valorant Wiki!</h1>
            <button type="button" class="text-lg bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full" @click="showModal = true">Add a Page!</button>

            <!--Overlay-->
		    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
			    <!--Dialog-->
			    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

				    <!--Title-->
				    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold text-gray-700">Create the New Page!</p>
                        <div class="cursor-pointer z-50" @click="showModal = false">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="48" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- content -->
                    <form action="page/" method="POST">
                        @csrf
                        <label class="text-gray-500 py-2">
                            Item Name
                            <input name="itemName" type="text" placeholder="Name of Item" required>
                        </label>

                        <label class="text-gray-500 py-2">
                            Agent?
                            <input name="agent" type="checkbox">
                        </label>

                        <label class="text-gray-500 py-2">
                            Map?
                            <input name="map" type="checkbox">
                        </label>

                        <label class="text-gray-500 py-2">
                            Skin?
                            <input name="skin" type="checkbox">
                        </label>

                        <label class="text-gray-500 py-2">
                            Weapon?
                            <input name="weapon" type="checkbox">
                        </label>

                        <label class="text-gray-500 py-2">
                            Image
                            <input name="mainImage" type="file" placeholder="Place the Main Image Here" required>
                        </label>

                        <label class="text-gray-500 py-2">
                            About Section
                            <input name="about" type="text" placeholder="All About the Item" required>
                        </label>

                        <label class="text-gray-500 py-2">
                            Ability One
                            <input name="abilityOne" type="text" placeholder="The First Ability">
                            <input name="aOneImage" type="file">
                        </label>
                        
                        <label class="text-gray-500 py-2">
                            Ability Two
                            <input name="abilityTwo" type="text" placeholder="The Second Ability">
                            <input name="aTwoImage" type="file">
                        </label>
                        
                        <label class="text-gray-500 py-2">
                            Ability Three
                            <input name="abilityThree" type="text" placeholder="The Third Ability">
                            <input name="aThreeImage" type="file">
                        </label>

                        <label class="text-gray-500 py-2">
                            Ability Four
                            <input name="abilityFour" type="text" placeholder="The Fourth Ability">
                            <input name="aFourImage" type="file">
                        </label>

                        <button type="submit" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Submit</button>
                    </form>

                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="showModal = false">Close</button>
                    </div>

			    </div>
			<!--/Dialog -->
		    </div><!-- /Overlay -->
        
        </div>
    </x-slot>

    <x-slot name="info">
        <body class="mx-auto w-full bg-gray-100 justify-center h-auto" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
            <div class="bg-gray-100 dark:bg-slate-900 h-screen w-screen flex justify-center">
                <div class="mr-8">
            
                    <h1 class="font-medium max-w-3xl mx-auto pt-10 pb-4"></h1>
                        <div class="bg-white dark:bg-slate-500 max-w-3xl mx-auto border border-gray-200 dark:border-gray-700" x-data="{selected:1}">
                            <ul class="shadow-box dark:text-slate-200">
                                            
                                <li class="relative border-b border-gray-200 dark:border-gray-700">

                                    <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Agents					
                                            </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p>Here is a list of Agent pages.</p>
                                            <p>-------------------------------</p>
                                            @foreach($pages as $page)

                                                <a href="/page/{{ $page->id }}"><p id="addAgent" class="py-2"> {{$page->itemName}} </p></a>

                                            @endforeach
                                            <!-- Add Button now needs to Link to Page -->
                                            <button @click="handleAddAgent" type="button" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Add Agent</button>
                                        </div>
                                    </div>

                                </li>

                                <li class="relative border-b border-gray-200 dark:border-gray-700">

                                    <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Maps					
                                            </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p>Here is a list of Map pages.</p>
                                            <p>-------------------------------</p>
                                            @foreach($pages as $page)

                                                <a href="/page/{{ $page->id }}"><p id="addMap" class="py-2"> {{$page->itemName}} </p></a>

                                            @endforeach
                                            <!-- Add Button now needs to Link to Page -->
                                            <button @click="handleAddMap" type="button" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Add Map</button>
                                        </div>
                                    </div>

                                </li>

                                <li class="relative border-b border-gray-200 dark:border-gray-700">

                                    <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Skins					
                                            </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p>Here is a list of Skin pages.</p>
                                            <p>-------------------------------</p>
                                            @foreach($pages as $page)

                                                <a href="/page/{{ $page->id }}"><p id="addSkin" class="py-2"> {{$page->itemName}} </p></a>

                                            @endforeach
                                            <!-- Add Button now needs to Link to Page -->
                                            <button @click="handleAddSkin" type="button" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Add Skins</button>
                                        </div>
                                    </div>

                                </li>

                                <li class="relative border-b border-gray-200 dark:border-gray-700">

                                    <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Weapons					
                                            </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p>Here is a list of Weapon pages.</p>
                                            <p>-------------------------------</p>
                                            @foreach($pages as $page)

                                                <a href="/page/{{ $page->id }}"><p id="addWeapon" class="py-2"> {{$page->itemName}} </p></a>

                                            @endforeach
                                            <!-- Add Button now needs to Link to Page -->
                                            <button @click="handleAddWeapon" type="button" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Add Weapons</button>
                                        </div>
                                    </div>

                                </li>

                            </ul>
                    </div>
                </div>
            <div class="ml-8">

            <script>
                        
                function handleAddAgent(e) {
                    let text;
                    let link = prompt("Please enter the new link:", "");
                    if (link == null || link == "") {
                        text = "";
                    } else {
                        text = link;
                    }
                document.getElementById("addAgent").innerHTML = text;
                }

                function handleAddMap(e) {
                    let text;
                    let link = prompt("Please enter the new link:", "");
                    if (link == null || link == "") {
                        text = "";
                    } else {
                        text = link;
                    }
                document.getElementById("addMap").innerHTML = text;
                }

                function handleAddSkin(e) {
                    let text;
                    let link = prompt("Please enter the new link:", "");
                    if (link == null || link == "") {
                        text = "";
                    } else {
                        text = link;
                    }
                document.getElementById("addSkin").innerHTML = text;
                }

                function handleAddWeapon(e) {
                    let text;
                    let link = prompt("Please enter the new link:", "");
                    if (link == null || link == "") {
                        text = "";
                    } else {
                        text = link;
                    }
                document.getElementById("addWeapon").innerHTML = text;
                }

            </script>
        </body>
    </x-slot>

</x-layout>