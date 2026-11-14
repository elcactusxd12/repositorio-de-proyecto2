<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Crear una nueva instancia del controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el dashboard principal.
     */
    public function index()
    {
        // =====================================================
        // 1. CONTADORES PRINCIPALES
        // =====================================================

        $totalContacts = DB::table('contacts')->count();

        $totalCompanies = DB::table('companies')->count();

        $totalGroups = DB::table('groups')->count();

        $totalUsers = DB::table('users')->count();


        // =====================================================
        // 2. CONTACTOS QUE TIENEN UNA EMPRESA ASIGNADA
        // =====================================================

        $contactsWithCompany = DB::table('contacts')
            ->whereNotNull('id_empresa')
            ->count();

        $contactCompanyRate = $totalContacts > 0
            ? min(
                100,
                max(
                    0,
                    round(($contactsWithCompany / $totalContacts) * 100, 1)
                )
            )
            : 0;


        // =====================================================
        // 3. EMPRESAS QUE TIENEN AL MENOS UN CONTACTO
        // =====================================================

        $companiesWithContacts = DB::table('contacts')
            ->whereNotNull('id_empresa')
            ->distinct()
            ->count('id_empresa');

        $companyCoverage = $totalCompanies > 0
            ? min(
                100,
                max(
                    0,
                    round(($companiesWithContacts / $totalCompanies) * 100, 1)
                )
            )
            : 0;


        // =====================================================
        // 4. GRUPOS QUE TIENEN AL MENOS UN CONTACTO
        // =====================================================

        $groupsWithContacts = DB::table('contacts')
            ->whereNotNull('id_grupo')
            ->distinct()
            ->count('id_grupo');

        $groupCoverage = $totalGroups > 0
            ? min(
                100,
                max(
                    0,
                    round(($groupsWithContacts / $totalGroups) * 100, 1)
                )
            )
            : 0;


        // =====================================================
        // 5. DISTRIBUCIÓN DE CONTACTOS POR EMPRESA
        // =====================================================

        $companiesDistribution = DB::table('companies')
            ->leftJoin(
                'contacts',
                'companies.id_empresa',
                '=',
                'contacts.id_empresa'
            )
            ->select(
                'companies.nombre_empresa',
                DB::raw('COUNT(contacts.id_contacto) AS total')
            )
            ->groupBy(
                'companies.id_empresa',
                'companies.nombre_empresa'
            )
            ->orderByDesc('total')
            ->get()
            ->map(function ($company) use ($totalContacts) {

                $company->percentage = $totalContacts > 0
                    ? round(
                        ($company->total / $totalContacts) * 100,
                        1
                    )
                    : 0;

                return $company;
            });


        // =====================================================
        // 6. ÚLTIMOS CONTACTOS REGISTRADOS
        // =====================================================

        // LEFT JOIN permite mostrar contactos sin empresa asignada.

        $recentContacts = DB::table('contacts')
            ->leftJoin(
                'companies',
                'contacts.id_empresa',
                '=',
                'companies.id_empresa'
            )
            ->select(
                'contacts.id_contacto',
                'contacts.nombres',
                'contacts.apellidos',
                'contacts.telefono_movil',
                'contacts.fecha_registro',
                'companies.nombre_empresa'
            )
            ->orderByDesc('contacts.fecha_registro')
            ->limit(15)
            ->get();


        // =====================================================
        // 7. USUARIOS REGISTRADOS EN EL SISTEMA
        // =====================================================

        $systemUsers = DB::table('users')
            ->select(
                'id',
                'name',
                'email',
                'created_at'
            )
            ->orderByDesc('created_at')
            ->get();


        // =====================================================
        // 8. ENVIAR VARIABLES A LA VISTA HOME
        // =====================================================

        return view('home', compact(
            'totalContacts',
            'totalCompanies',
            'totalGroups',
            'totalUsers',
            'contactsWithCompany',
            'contactCompanyRate',
            'companiesWithContacts',
            'companyCoverage',
            'groupsWithContacts',
            'groupCoverage',
            'companiesDistribution',
            'recentContacts',
            'systemUsers'
        ));
    }
}
