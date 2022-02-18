<x-admin-dashboard>
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    @if($shops->count() > 0 )
                        @if(isset($chosenShop))
                            <div>
                                <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete shop</h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">Are you sure you want to delete this {{ $chosenShop->name }} shop? All of its data will be permanently removed including shop owner, shop products and related comments, upvotes and verifications. This action cannot be undone.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <form method="post" action="/admin/shop:{{ $chosenShop->id }}/delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                                                </form>
                                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><a href="/admin/dashboard">Cancel</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shop Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number Of Products</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner Name</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach($shops as $shop)

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="/images/shop.jpg" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $shop->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $shop->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $shop->city }} , {{ $shop->street }}</div>
                                            <div class="text-sm text-gray-500">{{ $shop->country }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> {{ $shop->products->count() }} </span>
                                        </td>
                                        <td>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $shop->owner->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $shop->owner->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="post" action="/admin/shop:{{ $shop->id }}/confirm">
                                                @csrf
                                                <button class="text-xs text-red-400 hover:text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            <!-- More people... -->
                            </tbody>
                        </table>

                    @else

                        <h1 class="text-center font-semibold text-2xl text-red-500 my-20">No Shops Have Been Registered Yet!</h1>

                    @endif

                    </div>
                </div>
            </div>
        </div>

    </x-admin-dashboard>

{{--shop--}}
{{--INSERT INTO `test3`.`shops` (`id`,`owner_id`,`name`,`email`,`country`,`city`,`street`,`phone`,`created_at`,`updated_at`) VALUES ('5','5','Beauty Center','beauty@gmail.com','Syria','Damascus','Al-Midan','33850428','2022-02-18 16:11:21','2022-02-18 16:11:21');--}}

{{--owner--}}
{{--INSERT INTO `test3`.`owners` (`id`,`name`,`phone`,`email`,`password`,`created_at`,`updated_at`) VALUES ('5','Maria Shawish','39584093','maria@gmail.com','$2y$10$lHiW3Db8panjB5SvS7JGwemBfBDWVZnATCGy4lHfL/kqXaHFDsuYa','2022-02-18 16:11:21','2022-02-18 16:11:21');--}}

{{--products--}}
{{--INSERT INTO `test3`.`products` (`id`,`shop_id`,`category_id`,`name`,`slug`,`price`,`thumbnail`,`description`,`is_verified`,`published_at`,`created_at`,`updated_at`) VALUES ('6','5','3','Example Product','example-product','100','thumbnails/SsYvPkUAlWz1RS03bsE8lpR28hjMd7U1W1xMxKIi.webp','Eyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye''s cornea and lens.','0',NULL,'2022-02-18 16:12:26','2022-02-18 16:12:26');--}}
{{--INSERT INTO `test3`.`products` (`id`,`shop_id`,`category_id`,`name`,`slug`,`price`,`thumbnail`,`description`,`is_verified`,`published_at`,`created_at`,`updated_at`) VALUES ('7','5','1','Example Product Some Other One','example-product-2','500','thumbnails/c6KZXZnZHTVDpOfJhnBQ0v6yLNUt96ThJ5ijWK1V.jpg','Eyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye''s cornea and lens.','0',NULL,'2022-02-18 16:13:06','2022-02-18 16:13:06');--}}



{{--sql insert statement--}}
{{--INSERT INTO `test3`.`shops` (`id`,`owner_id`,`name`,`email`,`country`,`city`,`street`,`phone`,`created_at`,`updated_at`) VALUES ('5','5','Beauty Center','beauty@gmail.com','Syria','Damascus','Al-Midan','33850428','2022-02-18 16:11:21','2022-02-18 16:11:21');--}}
{{--INSERT INTO `test3`.`owners` (`id`,`name`,`phone`,`email`,`password`,`created_at`,`updated_at`) VALUES ('5','Maria Shawish','39584093','maria@gmail.com','$2y$10$lHiW3Db8panjB5SvS7JGwemBfBDWVZnATCGy4lHfL/kqXaHFDsuYa','2022-02-18 16:11:21','2022-02-18 16:11:21');--}}
{{--INSERT INTO `test3`.`products` (`id`,`shop_id`,`category_id`,`name`,`slug`,`price`,`thumbnail`,`description`,`is_verified`,`published_at`,`created_at`,`updated_at`) VALUES ('6','5','3','Example Product','example-product','100','thumbnails/SsYvPkUAlWz1RS03bsE8lpR28hjMd7U1W1xMxKIi.webp','Eyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye''s cornea and lens.','0',NULL,'2022-02-18 16:12:26','2022-02-18 16:12:26');--}}
{{--INSERT INTO `test3`.`products` (`id`,`shop_id`,`category_id`,`name`,`slug`,`price`,`thumbnail`,`description`,`is_verified`,`published_at`,`created_at`,`updated_at`) VALUES ('7','5','1','Example Product Some Other One','example-product-2','500','thumbnails/c6KZXZnZHTVDpOfJhnBQ0v6yLNUt96ThJ5ijWK1V.jpg','Eyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye''s cornea and lens.','0',NULL,'2022-02-18 16:13:06','2022-02-18 16:13:06');--}}
