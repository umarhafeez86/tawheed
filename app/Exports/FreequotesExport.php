<?php
namespace App\Exports;

use App\Models\Freequotes;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FreequotesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents, WithColumnFormatting
{

    protected $from;
    protected $to;

    // Constructor to accept status filter
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    /**
    * Fetch only orders matching the given status.
    */  
    public function collection()
    {
        return Freequotes::whereBetween('request_date', [
            $this->from,
            $this->to])->get();
    }

    /**
    * Format the exported data.
    */
    public function map($freequotes): array
    {
        return [
                'id'                    => $freequotes->id,
                'request_date'          => $freequotes->request_date,
                'person_fname'          => $freequotes->person_fname,
                'person_email'          => $freequotes->person_email,
                'person_phone'          => $freequotes->person_phone,
                'person_msg'            => $freequotes->person_msg,
                'travel_month'          => $freequotes->travel_month,
                'guests_info'           => $freequotes->guests_info,
                'nights_info'           => $freequotes->nights_info,
                'form_name'             => $freequotes->form_name,
                'page_url'              => $freequotes->page_url,
                'gclid'                 => $freequotes->gclid,
                'triptype'              => $freequotes->triptype,
                'DepartureCity'         => $freequotes->DepartureCity,
                'DestinationCity'       => $freequotes->DestinationCity,
                'hotel_type'            => $freequotes->hotel_type,
                'dateOption'            => $freequotes->dateOption,
        ];
    }

    // Define column headings
    public function headings(): array
    {
        return [
                'id',
                'Date',
                'Name',
                'Email',
                'Phone No.',
                'Message',
                'Travel Month',
                'Guests',
                'Nights',
                'FormName',
                'PageURL',
                'GCLID',
                'Trip Type',
                'Departure City',
                'Destination City',
                'Hotel Type',
                'Departure Date',
        ];
    }

    // FIXED method signature
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Header row
        ];
    }

    // Auto width + wrap text
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // Auto-size all columns
                foreach (range('A', $sheet->getHighestColumn()) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Wrap text for all rows
                $sheet->getStyle(
                    'A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow()
                )->getAlignment()->setWrapText(true);
            },
        ];
    }

    // Column Format
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER,
        ];
    }

}