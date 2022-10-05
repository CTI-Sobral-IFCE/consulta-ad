<?php

namespace App\Helper;

Use Illuminate\Support\Str;

class FormatData
{
    private static $courses = [
        '07333' => 'Tecnologia em Saneamento Ambiental',
        '07330' => 'Tecnologia em Mecatrônica Industrial',
        '07331' => 'Tecnologia em Alimentos',
        '07332' => 'Tecnologia em Irrigação e Drenagem',
        '07240' => 'Técnico em Eletrotécnica',
        '07241' => 'Técnico em Mecânica',
        '07243' => 'Técnico em Meio Ambiente',
        '07245' => 'Técnico em Fruticultura',
        '07244' => 'Técnico em Panificação',
        '07408' => 'Licenciatura em Física',
        '07334' => 'Tecnologia em Mecatrônica Industrial',
        '07247' => 'Técnico em Agroindústria',
        '07700' => 'Especialização em Gestão Ambiental',
        '07248' => 'Técnico em Segurança do Trabalho',
        '07800' => 'Mestrado Nacional Profissional em Ensino de Física',
        '07709' => 'Especialização em Gestão da Qualidade e Segurança dos Alimentos',
        '07249' => 'Técnico em Agropecuária',
        '07400' => 'Licenciatura em Matemática',
    ];

    public static function collectCourse($data)
    {
        if (array_key_exists(self::parseEnrollment($data), self::$courses)) {
            return self::$courses[self::parseEnrollment($data)];
        }

        return '-';
    }

    private static function parseEnrollment(string $enrollment)
    {
        return substr($enrollment, 5, 5);
    }
}
