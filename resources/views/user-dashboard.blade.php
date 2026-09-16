<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (!$student)

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                    <h1 class="text-2xl font-bold text-red-600">
                        Student Profile Not Found
                    </h1>

                    <p class="mt-2 text-gray-600">
                        There is no student profile linked to your account.
                    </p>

                </div>

            @else

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                    <h1 class="text-2xl font-bold">
                        Welcome, {{ $student->name }}
                    </h1>

                    <div class="mt-6">

                        <h2 class="text-xl font-semibold mb-4">
                            Student Information
                        </h2>

                        <table class="w-full border-collapse">

                            <tr class="border-b">
                                <th class="text-left p-3">
                                    University ID
                                </th>

                                <td class="p-3">
                                    {{ $student->University_ID }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3">
                                    Name
                                </th>

                                <td class="p-3">
                                    {{ $student->name }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3">
                                    Department
                                </th>

                                <td class="p-3">
                                    {{ $student->department?->Department_Name ?? 'No Department' }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3">
                                    City
                                </th>

                                <td class="p-3">
                                    {{ $student->city ?? 'N/A' }}
                                </td>
                            </tr>

                        </table>

                    </div>

                    <div class="mt-10">

                        <h2 class="text-xl font-semibold mb-4">
                            My Courses
                        </h2>

                        <div class="overflow-x-auto">

                            <table class="w-full border-collapse border">

                                <thead>

                                    <tr class="bg-gray-100">

                                        <th class="border p-3 text-left">
                                            Course ID
                                        </th>

                                        <th class="border p-3 text-left">
                                            Course Name
                                        </th>

                                        <th class="border p-3 text-left">
                                            Semester
                                        </th>

                                        <th class="border p-3 text-left">
                                            Teachers
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse ($student->courses as $course)

                                        <tr>

                                            <td class="border p-3">
                                                {{ $course->Course_ID }}
                                            </td>

                                            <td class="border p-3">
                                                {{ $course->Course_Name }}
                                            </td>

                                            <td class="border p-3">
                                                {{ $course->pivot->Semester }}
                                            </td>

                                            <td class="border p-3">

                                                @forelse ($course->teachers as $teacher)

                                                    <div>
                                                        {{ $teacher->name }}
                                                    </div>

                                                @empty

                                                    <span class="text-gray-500">
                                                        No Teacher Assigned
                                                    </span>

                                                @endforelse

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td
                                                colspan="4"
                                                class="border p-3 text-center"
                                            >
                                                No Courses Found
                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="mt-10">

                        <h2 class="text-xl font-semibold mb-4">
                            My Phone Numbers
                        </h2>

                        <table class="w-full border-collapse border">

                            <thead>

                                <tr class="bg-gray-100">

                                    <th class="border p-3 text-left">
                                        Phone Number
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($student->phones as $phone)

                                    <tr>

                                        <td class="border p-3">
                                            {{ $phone->Phone_Number }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td class="border p-3 text-center">
                                            No Phone Numbers Found
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
