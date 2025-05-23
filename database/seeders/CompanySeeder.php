<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'PT Telekomunikasi Indonesia Tbk (Telkom)',
                'company_field' => 'Telecommunications',
                'company_description' => 'Indonesia’s largest telecommunications company.',
                'company_address' => 'Jl. Japati No.1, Bandung, Jawa Barat',
                'company_phone' => '(022) 4523452',
            ],
            [
                'company_name' => 'PT Pertamina (Persero)',
                'company_field' => 'Energy & Oil',
                'company_description' => 'National oil and gas company of Indonesia.',
                'company_address' => 'Jl. Medan Merdeka Timur No. 1A, Jakarta',
                'company_phone' => '(021) 3815111',
            ],
            [
                'company_name' => 'Bank Rakyat Indonesia (BRI)',
                'company_field' => 'Banking & Finance',
                'company_description' => 'State-owned bank with strong rural focus.',
                'company_address' => 'Jl. Jenderal Sudirman Kav. 44-46, Jakarta',
                'company_phone' => '(021) 2510244',
            ],
            [
                'company_name' => 'Gojek',
                'company_field' => 'Tech & Ride-Hailing',
                'company_description' => 'Indonesia’s leading super app.',
                'company_address' => 'Jl. Kemang Selatan No. 99A, Jakarta Selatan',
                'company_phone' => '1500304',
            ],
            [
                'company_name' => 'Tokopedia',
                'company_field' => 'E-commerce',
                'company_description' => 'Top Indonesian online marketplace.',
                'company_address' => 'Jl. Prof. Dr. Satrio Kav. 11, Jakarta Selatan',
                'company_phone' => '021-53691015',
            ],
            [
                'company_name' => 'Bukalapak',
                'company_field' => 'E-commerce',
                'company_description' => 'Digital marketplace for SMEs.',
                'company_address' => 'Jl. DI Panjaitan No.7, Jakarta Timur',
                'company_phone' => '021-50813333',
            ],
            [
                'company_name' => 'PT Bank Central Asia (BCA)',
                'company_field' => 'Banking & Finance',
                'company_description' => 'Private bank with largest market cap in Indonesia.',
                'company_address' => 'Jl. MH Thamrin No. 1, Jakarta Pusat',
                'company_phone' => '1500888',
            ],
            [
                'company_name' => 'PT Unilever Indonesia Tbk',
                'company_field' => 'Consumer Goods',
                'company_description' => 'Multinational FMCG company.',
                'company_address' => 'Jl. BSD Boulevard Barat, Tangerang',
                'company_phone' => '0800-155-8000',
            ],
            [
                'company_name' => 'PT Astra International Tbk',
                'company_field' => 'Automotive & Manufacturing',
                'company_description' => 'Diversified conglomerate in auto, finance, and more.',
                'company_address' => 'Jl. Gaya Motor Raya No. 8, Sunter II, Jakarta',
                'company_phone' => '(021) 6522555',
            ],
            [
                'company_name' => 'Shopee Indonesia',
                'company_field' => 'E-commerce',
                'company_description' => 'Popular Southeast Asian online shopping platform.',
                'company_address' => 'Pacific Century Place, SCBD, Jakarta Selatan',
                'company_phone' => '021-39500300',
            ],
            [
                'company_name' => 'Traveloka',
                'company_field' => 'Travel & Tech',
                'company_description' => 'Online travel booking platform.',
                'company_address' => 'Jl. Kebon Sirih No. 17-19, Jakarta Pusat',
                'company_phone' => '0804-1500-308',
            ],
            [
                'company_name' => 'Indosat Ooredoo Hutchison',
                'company_field' => 'Telecommunications',
                'company_description' => 'One of Indonesia’s largest telco providers.',
                'company_address' => 'Jl. Medan Merdeka Barat No.21, Jakarta Pusat',
                'company_phone' => '185',
            ],
            [
                'company_name' => 'PT PLN (Persero)',
                'company_field' => 'Electricity & Utilities',
                'company_description' => 'National electricity provider.',
                'company_address' => 'Jl. Trunojoyo Blok M-I No.135, Jakarta Selatan',
                'company_phone' => '123',
            ],
            [
                'company_name' => 'Lion Air Group',
                'company_field' => 'Airline & Transportation',
                'company_description' => 'Low-cost airline group in Indonesia.',
                'company_address' => 'Jl. Gajah Mada No.7, Jakarta Barat',
                'company_phone' => '021-63798000',
            ],
            [
                'company_name' => 'Garuda Indonesia',
                'company_field' => 'Aviation',
                'company_description' => 'Flag carrier airline of Indonesia.',
                'company_address' => 'Jl. Kebon Sirih No. 44, Jakarta Pusat',
                'company_phone' => '0804-1-807-807',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
