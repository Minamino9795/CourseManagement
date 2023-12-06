<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderExport implements  FromCollection, WithHeadings,  WithMapping, ShouldAutoSize, WithStyles
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with(['user', 'course'])->get(['user_id', 'course_id']);
    }

    public function headings(): array
    {
        return [
            'Tên',
            'Khóa học',
            'Email',
            'Số điện thoại',
            'Giá',
        ];
    }
    public function map($order): array
    {
        return [
            $order->user->name, 
            $order->course->name, 
            $order->user->email, 
            $order->user->phone, 
           number_format($order->course->price)
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A1:E1' => ['font' => ['bold' => true]],
        ];
    }
}
