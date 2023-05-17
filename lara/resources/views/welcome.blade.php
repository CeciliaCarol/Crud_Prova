<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página inicial') }}
        </h2>
    </x-slot>
    <style>
        .bg-blue-500{
    background-color: rgb(59 130 246 / var(--tw-bg-opacity));}

    .rounded-full {
    border-radius: 9999px;
}

.px-5 {
    padding-left: 1.25rem/* 20px */;
    padding-right: 1.25rem/* 20px */;
}
    </style>

</br>

    <div class="py-7 dark:bg-gray-800 max-w-6xl mx-auto sm:px-10 lg:px-10 rounded-md">
         <form action="{{ route('mercado.store') }}" method="POST">
                        @csrf
                        <x-text-input class="py-1 px-2" name="nome" placeholder="Nome" />
                        <x-text-input class="py-1 px-2"  name="endereco" placeholder="Endereço" />
                        <x-text-input class="py-1 px-2"  name="telefone" placeholder="Telefone" />
                        <x-text-input class="py-1 px-2"  name="ncaixas" placeholder="Nº de Caixas" />
                        <x-text-input class="py-1 px-2"  name="hfunciona" placeholder="H. de Funcionamento" />
                        <x-primary-button class="">Salvar</x-primary-button>
                    </form>
</div>
</br>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8" >
        
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
            <table class=" w-full rounded-md">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Nome</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Endereço</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Telefone</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Nº de Caixas</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                H. de Funcionamento</th>
              <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800" colspan="3">
                Ação</th>
            </tr>
          </thead>
          @foreach (Auth::user()->myMercados as $mercado)
          <tbody class="bg-gray-600" x-data="{showDelete:false, showEdit:false}">
            
            <tr>
            
              <td class="px-6 py-4  border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-700">{{$mercado ->nome}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-gray-700">{{$mercado ->endereco}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-gray-700">{{$mercado -> telefone}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-gray-700">{{$mercado -> ncaixas}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-gray-700">{{$mercado -> hfunciona}}
                </div>
              </td>

              <td class="font-medium text-center whitespace-no-wrap border-b border-gray-200 ">
              <div class="flex gap-2 flex-col">
                            <div>
                                <button class="cursor-pointer px-4 bg-blue-500 text-gray-700 rounded-full" @click="showDelete = true">Deletar</button>
                            </div>
                            <div>
                                <button class="cursor-pointer px-5 bg-blue-500 text-gray-700 rounded-full" @click="showEdit = true">Editar</button>
                            </div>
                        </div>
                        <template x-if="showDelete">
                            <div class="absolute top-4 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0 ">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4  z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Tem certeza?</h2>
                                    <div class="flex justify-between mt-4">
                                        <form action="{{ route('mercado.destroy', $mercado) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="ml-12">Deletar</x-danger-button> 
                                            <x-primary-button @click="showDelete = false" class="m-7 w-50">Cancelar</x-primary-button>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="showEdit">
                            <div class="absolute top-4 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-7xl font-bold text-center">Edite</h2>
                                        <form  class="my-4" action="{{ route('mercado.update', $mercado) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-text-input class="py-1 px-2 m-3" name="nome" placeholder="Nome" value="{{$mercado ->nome}}" />
                                            <x-text-input class="py-1 px-2 m-3" name="endereco" placeholder="Endereço" value="{{$mercado ->endereco}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="telefone" placeholder="Telefone" value="{{$mercado ->telefone}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="ncaixas" placeholder="Nº de Caixas" value="{{$mercado ->ncaixas}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="hfunciona" placeholder="H. de Funcionamento" value="{{$mercado ->hfunciona}}" />
                                        </br>
                                            <x-primary-button class=" text-center mt-2">Salvar</x-primary-button>
                                            <x-danger-button @click="showEdit = false" class="w-50 ">Cancelar</x-danger-button>
                                        </form>
                                        
                                </div>
                            </div>
                        </template>
            
          
                    </div>
              </td>
          </tbody>
        
              
                    @endforeach
                 </table>

              
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
