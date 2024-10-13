@extends('layout.headerFooter')

@section('content')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
          <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Posts</h2>
      </div>
      <div class="grid lg:grid-cols-1 space-y-4">
          <article class="p-6 bg-lightblue rounded-lg border border-gray-200 shadow-md">
              <div class="flex justify-between items-center mb-5 text-gray-400">
                  <span class="ml-auto text-sm">14 days ago</span>
              </div>
              <div class="flex space-x-8">
                <div>
                    <img class="w-20 h-20 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                </div>
                <div>
                    <h2 class="mb-2 text-2xl tracking-tight text-cyan">UI/UX Designer</h2>
                    <h2 class="mb-2 text-xl tracking-tight text-cyan">Bank Central Asia</h2>
                    <p class="text-lg text-gray-400">Posted by Jese Leos</p>
                </div>
              </div>
          </article>
      </div>
  </div>
</section>
@endsection
