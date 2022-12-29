<x-xml-layout>
    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">XML RESPONSE</h2>
        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 xl:gap-x-8">
            @foreach($msgs as $msg)
                    <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Payment Informations</p>
                            <p>{{$line->Cdtr->Nm}}</p>
                            <p>{{$line->CdtrAcct->Id->IBAN}}</p>
                            <p class="font-bold">Error Informations</p>
                            <p>{{$msg}}</p>
                        </div>
                    </div>
            @endforeach
            <p>Number of payments : {{count($payments->CdtTrfTxInf)}} | Declared : {{$file_info->NbOfTxs}}</p>
            @foreach($payments->CdtTrfTxInf as $payment)
                    <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Payment Informations</p>
                            <p>{{$payment->Cdtr->Nm}}</p>
                            <p>{{$payment->CdtrAcct->Id->IBAN}}</p>
                            <p>{{$payment->Amt->InstdAmt['Ccy']}}</p>
                            <p>{{$payment->Amt->InstdAmt}}</p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    </div>
</x-xml-layout>