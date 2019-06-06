On Error Resume Next

Const wbemFlagReturnImmediately = &h10
Const wbemFlagForwardOnly = &h20

If wscript.arguments.count=0 Then wscript.quit
strComputer = wscript.arguments(0)

   WScript.Echo
   WScript.Echo "=========================================="
   WScript.Echo "Computer: " & strComputer
   WScript.Echo "=========================================="

   Set objWMIService = GetObject("winmgmts:\\" & strComputer & "\root\CIMV2")
   Set colItems = objWMIService.ExecQuery("SELECT * FROM Win32_OperatingSystem", "WQL", _
                                          wbemFlagReturnImmediately + wbemFlagForwardOnly)

   For Each objItem In colItems
      WScript.Echo "BootDevice: " & objItem.BootDevice
      WScript.Echo "BuildNumber: " & objItem.BuildNumber
      WScript.Echo "BuildType: " & objItem.BuildType
      WScript.Echo "Caption: " & objItem.Caption
      WScript.Echo "CodeSet: " & objItem.CodeSet
      WScript.Echo "CountryCode: " & objItem.CountryCode
      WScript.Echo "CreationClassName: " & objItem.CreationClassName
      WScript.Echo "CSCreationClassName: " & objItem.CSCreationClassName
      WScript.Echo "CSDVersion: " & objItem.CSDVersion
      WScript.Echo "CSName: " & objItem.CSName
      WScript.Echo "CurrentTimeZone: " & objItem.CurrentTimeZone
      WScript.Echo "Debug: " & objItem.Debug
      WScript.Echo "Description: " & objItem.Description
      WScript.Echo "Distributed: " & objItem.Distributed
      WScript.Echo "EncryptionLevel: " & objItem.EncryptionLevel
      WScript.Echo "ForegroundApplicationBoost: " & objItem.ForegroundApplicationBoost
      WScript.Echo "FreePhysicalMemory: " & objItem.FreePhysicalMemory
      WScript.Echo "FreeSpaceInPagingFiles: " & objItem.FreeSpaceInPagingFiles
      WScript.Echo "FreeVirtualMemory: " & objItem.FreeVirtualMemory
      WScript.Echo "InstallDate: " & WMIDateStringToDate(objItem.InstallDate)
      WScript.Echo "LargeSystemCache: " & objItem.LargeSystemCache
      WScript.Echo "LastBootUpTime: " & WMIDateStringToDate(objItem.LastBootUpTime)
      WScript.Echo "LocalDateTime: " & WMIDateStringToDate(objItem.LocalDateTime)
      WScript.Echo "Locale: " & objItem.Locale
      WScript.Echo "Manufacturer: " & objItem.Manufacturer
      WScript.Echo "MaxNumberOfProcesses: " & objItem.MaxNumberOfProcesses
      WScript.Echo "MaxProcessMemorySize: " & objItem.MaxProcessMemorySize
      WScript.Echo "Name: " & objItem.Name
      WScript.Echo "NumberOfLicensedUsers: " & objItem.NumberOfLicensedUsers
      WScript.Echo "NumberOfProcesses: " & objItem.NumberOfProcesses
      WScript.Echo "NumberOfUsers: " & objItem.NumberOfUsers
      WScript.Echo "Organization: " & objItem.Organization
      WScript.Echo "OSLanguage: " & objItem.OSLanguage
      WScript.Echo "OSProductSuite: " & objItem.OSProductSuite
      WScript.Echo "OSType: " & objItem.OSType
      WScript.Echo "OtherTypeDescription: " & objItem.OtherTypeDescription
      WScript.Echo "PlusProductID: " & objItem.PlusProductID
      WScript.Echo "PlusVersionNumber: " & objItem.PlusVersionNumber
      WScript.Echo "Primary: " & objItem.Primary
      WScript.Echo "ProductType: " & objItem.ProductType
      WScript.Echo "QuantumLength: " & objItem.QuantumLength
      WScript.Echo "QuantumType: " & objItem.QuantumType
      WScript.Echo "RegisteredUser: " & objItem.RegisteredUser
      WScript.Echo "SerialNumber: " & objItem.SerialNumber
      WScript.Echo "ServicePackMajorVersion: " & objItem.ServicePackMajorVersion
      WScript.Echo "ServicePackMinorVersion: " & objItem.ServicePackMinorVersion
      WScript.Echo "SizeStoredInPagingFiles: " & objItem.SizeStoredInPagingFiles
      WScript.Echo "Status: " & objItem.Status
      WScript.Echo "SuiteMask: " & objItem.SuiteMask
      WScript.Echo "SystemDevice: " & objItem.SystemDevice
      WScript.Echo "SystemDirectory: " & objItem.SystemDirectory
      WScript.Echo "SystemDrive: " & objItem.SystemDrive
      WScript.Echo "TotalSwapSpaceSize: " & objItem.TotalSwapSpaceSize
      WScript.Echo "TotalVirtualMemorySize: " & objItem.TotalVirtualMemorySize
      WScript.Echo "TotalVisibleMemorySize: " & objItem.TotalVisibleMemorySize
      WScript.Echo "Version: " & objItem.Version
      WScript.Echo "WindowsDirectory: " & objItem.WindowsDirectory
      WScript.Echo
   Next



Function WMIDateStringToDate(dtmDate)
WScript.Echo dtm: 
	WMIDateStringToDate = CDate(Mid(dtmDate, 5, 2) & "/" & _
	Mid(dtmDate, 7, 2) & "/" & Left(dtmDate, 4) _
	& " " & Mid (dtmDate, 9, 2) & ":" & Mid(dtmDate, 11, 2) & ":" & Mid(dtmDate,13, 2))
End Function