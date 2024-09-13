<?php
$books = [
    [
        "name" => "Clean Code: A Handbook of Agile Software Craftsmanship",
        "author" => "Robert C. Martin",
        "purchaseUrl" => "https://www.amazon.co.jp/-/en/Martin-Robert-C-ebook/dp/B001GSTOAM/ref=sr_1_6?crid=FDE7U2ZKVAYI&dib=eyJ2IjoiMSJ9.jkQYWGG2y932tWBB3oY453wWS05hwnjHoYqk3OQIZIIoER8A3er3XwWGBNm7CLbUuy5sJwc9zT7NtligLMNsN25gkx9pvDViQkmz9e1B-0sxicG-xJXHn4oNobTLhvjH_iii5peTQNOOqZDOXVd00w-ZElLHWE94EaYlHEDUdXxPSgjUX5nllqxq8QoRVioQckR_kLeXjGglMJQ0euA5g5jaQrIMhi-SJNzEMS2bZNb1xGXiGO19i1idQQ-eSweuV1kT_dRI9iPce1YsGmh49abN4U0rJAy7fVfCCin_R0s.MrU3psjWNmPXsdMyqJKyyzJcbvmwAOtWcUMy7TpZVdI&dib_tag=se&keywords=clean+code&qid=1726109572&sprefix=clean+cod%2Caps%2C172&sr=8-6",
        "imageUrl" => "https://a.media-amazon.com/images/I/71T7aD3EOTL._SY466_.jpg",
        "releaseDate" => 2000
    ],
    [
        "name" => "Clean Architecture: A Craftsman's Guide to Software Structure and Design ",
        "author" => "Robert C. Martin",
        "purchaseUrl" => "https://www.amazon.co.jp/-/en/Robert-C-Martin-ebook/dp/B075LRM681/ref=reads_cwrtbar_d_sccl_1_3/356-0721519-1128317?pd_rd_w=wpPrr&content-id=amzn1.sym.44075543-1105-4b6d-8a9c-004885d62a79&pf_rd_p=44075543-1105-4b6d-8a9c-004885d62a79&pf_rd_r=40F5J21TRF4XGTYBGDSQ&pd_rd_wg=qgKd2&pd_rd_r=a0663bdc-964a-4cca-ad78-b5c82c7d41c0&pd_rd_i=B075LRM681&psc=1",
        "imageUrl" => "https://a.media-amazon.com/images/I/619ht2WrGTL._SY466_.jpg",
        "releaseDate" => 2017
    ],
    [
        "name" => "五等分の花嫁（３） (週刊少年マガジンコミックス)",
        "author" => "春場ねぎ",
        "purchaseUrl" => "https://www.amazon.co.jp/%E6%98%A5%E5%A0%B4%E3%81%AD%E3%81%8E-ebook/dp/B07B7J61JJ/?_encoding=UTF8&pd_rd_w=ZfSdw&content-id=amzn1.sym.b88d94eb-865c-40c1-891c-1e8277b638b4&pf_rd_p=b88d94eb-865c-40c1-891c-1e8277b638b4&pf_rd_r=356-0721519-1128317&pd_rd_wg=FktWp&pd_rd_r=ccfdc096-bdeb-473e-b540-dcc058b92607&ref_=aufs_ap_sc_dsk",
        "imageUrl" => "https://a.media-amazon.com/images/I/91+JBlxLTFL._SY466_.jpg",
        "releaseDate" => 2017
    ],
];

$filter = function ($items, $fn): array {
    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};

$filteredItems = array_filter(array: $books, callback: fn($book): bool => $book['releaseDate'] > 2010 && $book['author'] === '春場ねぎ');

require 'index.view.php';
